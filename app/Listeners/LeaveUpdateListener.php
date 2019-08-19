<?php

namespace App\Listeners;

use App\Events\LeaveUpdateEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LeaveUpdateListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  LeaveUpdateEvent  $event
     * @return void
     */
    public function handle(LeaveUpdateEvent $event)
    {
        
        \App\LeaveActivity::create([
            'leave_id' => $event->leave->id,
            'start_date' => $event->leave->leave_start,
            'end_date' => $event->leave->leave_end
        ]);
    }
}
