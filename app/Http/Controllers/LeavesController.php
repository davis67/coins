<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Leave;
use App\Holiday;
use App\Leaveforward;
use App\Models\User;
use App\Leavesetting;
use App\Leavetracker;
use App\Leavestatus;
use App\Notifications\leaveStatusNotification;
use App\Notifications\acceptLeaveNotification;
use App\Notifications\declineLeaveNotification;
use App\Events\LeaveUpdateEvent;
use Session;
use Auth;
use App\Financialyear;
use App\Title;
use DB;
use Carbon\CarbonPeriod;
use Carbon\Carbon;

class LeavesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }


    public function create()
    {
        return view('leaves.create');
    }

    public  function leaveRequestForm($id, $leave_id)
    {
        // dd(auth()->user()->id);
        $notification = DB::table('notifications')
            ->where('id', $id)->first();
        $leave = Leave::findOrFail($leave_id);
        return view('leaves.leaveRequest', compact('notification', 'leave'));
    }

    public function updateLeaveRequest(Request $request)
    {
        $chief_of_staff = Title::where('id', 6)->get()[0]->users[0];
        //validate the status.the leave has to either accepted or declined
        $this->validate($request, [
            'status' => 'required'
        ]);

        //accept leave
        if ($request->status == 'accept') {
            //update the leave from the supervisors side
            $leave = Leave::findOrFail($request->leave_id);
            Leavestatus::create([
                'leave_id' => $request->leave_id,
                'approved_by' => auth()->user()->id,
                'comment' => $request->comment
            ]);
            //send the notification the the chief of staffs

            $chief_of_staff->notify(new acceptLeaveNotification($leave));
            //getting the notification direct from the database.
            $hack_notification = DB::table('notifications')
                ->where('id', $request->notification_id)->first();

            //trying to hack around  on the notification
            //this might be even close to the best way to mark the notification as read.Update later
            foreach (auth()->user()->notifications as $notification) {
                if ($notification->id == $hack_notification->id) {
                    $notification->markAsRead();
                }
            }


            //call the notification to the user who requested for the leave

            return redirect()->route('home')->with('success', 'You have successfully endorsed a leave request');
            //return statement
            //dont update the the email
        }

        //decline
        if ($request->status == 'decline') {

            //update the leave from the supervisors side
            Leavestatus::create([
                'leave_id' => $request->leave_id,
                'approved_by' => auth()->user()->id,
                'comment' => $request->comment

            ]);

            //update the status of the leave.
            $leave = Leave::findOrFail($request->leave_id);

            $leave->update([
                'leave_status' => 'declined'
            ]);

            //getting the notification direct from the database.
            $hack_notification = DB::table('notifications')
                ->where('id', $request->notification_id)->first();

            //trying to hack around  on the notification
            //this might be even close to the best way to mark the notification as read.Update later
            foreach (auth()->user()->notifications as $notification) {
                if ($notification->id == $hack_notification->id) {
                    $notification->markAsRead();
                }
            }


            //call the notification to the user who requested for the leave

            $leave->user->notify(new declineLeaveNotification($leave));

            return redirect()->route('home')->with('success', 'You have successfully cancelled a leave request');
            //return statement
            //dont update the the email
        }
    }
    // public function checkSettings($duration,$leaveType){

    //     $msg ='';
    //     $bookable = [];
    //     $settings = Leavesetting::where(['leave_type'=>$leaveType])->get(['bookable_days']);
    //     foreach($settings as $setting){
    //         array_push($bookable,$setting->bookable_days);
    //     }
    //     $bookable = $bookable[0];
    //     switch ($leaveType){
    //         case 'Annual':
    //             if( $duration > $bookable){
    //                 $msg .=' cannot exceed '.$bookable.' days';
    //             }else{
    //                 $msg .='Passed';
    //             }
    //             break;
    //         case 'Maternity':
    //             if( $duration != $bookable){
    //                 $msg .=' allows only '.$bookable.' days';
    //             }else{
    //                 $msg .='Passed';
    //             }
    //         break;
    //         case 'Paternity':
    //             if( $duration != $bookable){
    //             $msg .=' allows only '.$bookable.' days';
    //         }else{
    //             $msg .='Passed';
    //         }
    //         break;
    //         case 'Compassionate':
    //             if( $duration > $bookable){
    //                 $msg .='allows only '.$bookable.' days';
    //             }else{
    //                 $msg .='Passed';
    //             }
    //         break;
    //         default:
    //         $msg .='Passed';
    //     }
    //     return $msg;
    // }

    public function index()
    {
        $leaves = Leave::where('user_id', auth()->user()->id)->get();
        return view('leaves.index', compact('leaves'));
    }

    public function store(Request $request)
    {
        // this will always return an error exactly after seeding in new users.s
        $supervisor = User::findOrFail(auth()->user()->reportsTo);
        // dd($supervisor);
        //attach the finacial year to the leave.I found it easy this way
        //to keep track on the leave setting
        $current_financial_year = null;
        $financial_years = Financialyear::all();

        foreach ($financial_years as $financial_year) {
            if (Carbon::now()->between(Carbon::create($financial_year->start_date), Carbon::create($financial_year->end_date))) {
                $current_financial_year = $financial_year->id;
            }
        }
        //check if the leave requested exists in the database
        $leave_exists  = Leave::where([
            ['leavesetting_id', '=', $request->the_leavesetting],                                        ['financialyear_id', '=', $current_financial_year]
        ])->first();

        //validate leave requests here
        $data = $request->validate([
            'the_leavesetting' => 'required',
            'leave_start'  => 'required|date|after:tomorrow',
            'leave_end'    => 'required|date|after:leave_start',
            'leave_detail' => 'required',
        ]);


        //save the leave requested in the database  if its not existing
        if ($leave_exists == null) {
            $save_leave = Leave::create([
                'user_id' => auth()->user()->id,
                'leavesetting_id' => $data['the_leavesetting'],
                'leave_start' => $data['leave_start'],
                'leave_end' => $data['leave_end'],
                'leave_detail' => $data['leave_detail'],
                'financialyear_id' => $current_financial_year,
                'duration' => Leave::calculateDuration(
                    $request->leave_start,
                    $request->leave_end
                ),
                'leave_status' => 'pending',
                'created_by' => auth()->user()->id
            ]);
            //recording an activity any time a leave is requested
            event(new LeaveUpdateEvent($save_leave));
            $supervisor->notify(new leaveStatusNotification($save_leave));
        } else {
            //Here you update the leave if it exists for a certain financial year
            $leave_exists->update([
                'duration' => Leave::calculateDuration(
                    $request->leave_start,
                    $request->leave_end
                ) + $leave_exists->duration
            ]);


            //recording an activity any time a leave is requested
            event(new LeaveUpdateEvent($leave_exists));
            $supervisor->notify(new leaveStatusNotification($leave_exists));
        }
        return redirect()->route('leaves.index')
            ->with('success', "Your leave request has been successfully recorded.");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $leave = Leave::findOrFail($id);
        return view('leaves.show', compact('leave'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Leave $leave)
    {
        $id = $request->id;
        $updated = Leave::where('id', $id)->update(['status' => $request->status]);
        if ($updated) {
            return ("Leave " . $status);
        } else {
            return ("Leave status Change failed");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Leave $leave)
    {
        $leave->delete();
    }
}
