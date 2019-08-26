@foreach (auth()->user()->unreadNotifications as $notification)
@if($notification->type == 'App\Notifications\leaveStatusNotification')
<div class="alert font-16 shadow-css">
    <span class="text-primary">
        <i class="mdi mdi-information font-18"></i>
        Notification!
    </span>

    <a href="{{route('leaveRequest', [$notification->id, $notification->data['leave_id']])}}">{{\App\Leave::find($notification->data['leave_id'])->user->name}}
        has requested for {{\App\Leave::find($notification->data['leave_id'])->leavesetting->leave_type}} leave for
        {{\App\Leave::find($notification->data['leave_id'])->duration }} days.</a>
    <button type="button" class="close text-light-gray" data-dismiss="alert" aria-label="Close">
        <i class="mdi mdi-close font-16"></i>
    </button>
</div>
@elseif($notification->type == 'App\Notifications\declineLeaveNotification')
<div class="alert font-16 shadow-css">
        <span class="text-primary">
            <i class="mdi mdi-information font-18"></i>
            Notification!
        </span>
    
        <a href="">Your request for {{\App\Leave::find($notification->data['leave_id'])->leavesetting->leave_type}} leave for
            {{\App\Leave::find($notification->data['leave_id'])->duration }} days has been declined.Sorry.</a>
        <button type="button" class="close text-light-gray" data-dismiss="alert" aria-label="Close">
            <i class="mdi mdi-close font-16"></i>
        </button>
    </div>
    @elseif($notification->type == 'App\Notifications\acceptLeaveNotification')
    <div class="alert font-16 shadow-css">
            <span class="text-primary">
                <i class="mdi mdi-information font-18"></i>
                Notification!
            </span>
        
            <a href="">Your request for {{\App\Leave::find($notification->data['leave_id'])->leavesetting->leave_type}} leave for
                {{\App\Leave::find($notification->data['leave_id'])->duration }} days has been accepted.Enjoy.</a>
            <button type="button" class="close text-light-gray" data-dismiss="alert" aria-label="Close">
                <i class="mdi mdi-close font-16"></i>
            </button>
        </div>
@endif
@endforeach