<?php

namespace App\Listeners;

use App\Events\NeedMarkedComplete;

class SendConfirmationText
{

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
