<?php

namespace App\Events;

use App\Events\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserLoginEvent extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $user;
    /**
     * Create a new event instance.
     *
     * @return void
     */

    public function __construct($user)
    {
        $this->user = $user;
      
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['user-channel'];
    }
}
