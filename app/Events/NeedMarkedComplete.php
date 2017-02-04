<?php

namespace App\Events;

use App\Need;
use App\UrgentNeed;
use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Foundation\Events\Dispatchable;

class NeedMarkedComplete
{
    use Dispatchable;

    /**
     * @var Need|UrgentNeed
     */
    public $need;

    /**
     * Create a new event instance.
     *
     * @param $need
     */
    public function __construct($need)
    {
        $this->need = $need;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
