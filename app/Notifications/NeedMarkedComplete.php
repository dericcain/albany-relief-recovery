<?php

namespace App\Notifications;

use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class NeedMarkedComplete extends Notification
{

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)->content('Hi! It looks like your requested help from Albany Relief + Recovery is complete. If this is not the case and you still need help, please reply to this text with a short description of your needs. Otherwise, blessings!');
    }

}
