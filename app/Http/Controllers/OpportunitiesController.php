<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Opportunity;

use App\Http\Requests\OpportunityRequest;
use App\Http\Resources\OpportunitiesResource;
use App\Http\Resources\OpportunitiesCollection;
use App\Project;
use App\Models\Team;
use App\Task;
use App\Contact;
use App\User;
use Countries;
use App\OpportunityUser;
use Carbon\Carbon;
use App\Notifications\OpportunityCreated;
use App\Notifications\OpportunityAssigned;
use App\Notifications\OpportunityWon;
use App\DeliverableOpportunity;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use App\Charts\CoinChart;
use Session;
use Auth;
use DB;
use App\Http\Resources\OpportunityResource;
use App\Http\Resources\TeamsCollection;
use Gate;


class OpportunitiesController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth');
    }

    /**
     * View all opportunities.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        return view('opportunities.index');
    }

    /**
     * get all the opportunities from the database, order by the latest
     * @return collection
     */

    public function getAllOpportunities()
    {
        return new OpportunitiesCollection(Opportunity::all());
    }


    /**
     * Create a new opportunity.
     *
     * @return \Illuminate\Http\Response
     */

    public function create()
    {
        $teams = Team::all();
        $users = User::all();
        $countries = Countries::all()->pluck('name.common');
        return view('opportunities.create', compact('teams', 'users', 'countries'));
    }

    public function makeSummary($type, $start_date = NULL)
    {
        $start_date = isset($start_date) ? $start_date : 30;
        $backDate = today()->subDays($start_date);
        $teams = Team::all();
        $sales_stages = ['Lost', 'Won', 'Under preparation', 'Under Review', 'Submitted', 'Not submitted', 'Dropped'];
        $total = [];
        $index = 0;
        foreach ($teams as $team) :
            $total[$index]['team'] = $team->team_code;
            foreach ($sales_stages as $sales_stage) :
                $proposals = Opportunity::where(['team_id' => $team->id, 'type' => $type, 'sales_stage' => $sales_stage])
                    ->whereBetween('created_at', [$backDate->toDateTimeString(), today()->toDateTimeString()])->get();
                $sales_stage = strtolower(implode(explode(' ', $sales_stage), ''));
                $total[$index][$sales_stage] = $proposals->count();
            endforeach;
            $index += 1;
        endforeach;
        return $total;
    }

    public function store(OpportunityRequest $request)
    {
        return auth()->user()->opportunities()->create($request->validated());
    }

    /**
     * assign a consultant.
     *
     * @return \Illuminate\Http\Response
     */
    public function assignConsultants($opportunityId, $userId)
    {
        $opportunity = Opportunity::findOrFail($opportunityId);
        $consultant = User::findOrFail($userId);
        $opportunity->assignConsultant($consultant);
        return 'success';
    }

    /**
     * Display the resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getOpportunity(Opportunity $opportunity)
    {
        return Opportunity::findOrFail($opportunity->id);
    }

    /**
     * Display the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\Response
     */

    public function show($id)
    {
        $opportunity = new OpportunitiesResource(Opportunity::findOrFail($id));
        return view('opportunities.show', compact('opportunity'));
    }

    /**
     * Edit the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $opportunity = new OpportunitiesResource(Opportunity::findOrFail($id));
        $countries = Countries::all()->pluck('name.common');
        return view("opportunities.edit", compact("opportunity", "teams", "countries"));
    }

    /**
     * Update the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function update(OpportunityRequest $request, $id)
    {
        $opportunity  = Opportunity::findOrFail($id);
        $opportunity->update($request->validated());
        return 'success';
    }

    /**
     * Destroy the opportunity.
     *
     * @param  Opportunity $opportunity
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */

    public function destroy($id)
    {
        $opportunity = Opportunity::findOrFail($id);
        $opportunity->delete();
        return "success";
    }
}
