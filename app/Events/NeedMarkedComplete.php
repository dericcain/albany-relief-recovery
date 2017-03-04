<?php

namespace App\Events;

use App\Need;
use App\UrgentNeed;
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
}
