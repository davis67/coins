<?php

namespace App\Events;

use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;


class LeaveUpdateEvent
{
    use Dispatchable,  SerializesModels;

    public $leave;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($leave)
    {
       $this->leave = $leave;
    }

}
