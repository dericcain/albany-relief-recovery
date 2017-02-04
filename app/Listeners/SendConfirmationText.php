<?php

namespace App\Listeners;

use App\Events\NeedMarkedComplete;

class SendConfirmationText
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
     * @param  NeedMarkedComplete $event
     * @return void
     */
    public function handle(NeedMarkedComplete $event)
    {
        $event->need->notify(new \App\Notifications\NeedMarkedComplete());
    }
}
