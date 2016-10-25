<?php

namespace App\Events;

use App\Events\Event;
use App\Resource;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class NewResourceVisit extends Event implements ShouldBroadcast
{
    use SerializesModels;

    public $resource;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Resource $resource)
    {
        $this->resource = $resource;
    }

    /**
     * Get the channels the event should be broadcast on.
     *
     * @return array
     */
    public function broadcastOn()
    {
        return ['resource'];
    }
}
