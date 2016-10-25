<?php

namespace App\Events;

use App\Events\Event;
use App\Visitor;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NewMemberRegistered extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $member;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Visitor $member)
    {
        $this->member = Visitor::where('id', $member->id)->with('course.college')->first();
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['member'];
    }
}
