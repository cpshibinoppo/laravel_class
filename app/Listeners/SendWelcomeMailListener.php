<?php

namespace App\Listeners;

use App\Events\NewUserCreatedEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\UserCreatedMail;
use App\Models\User;
use App\Notifications\NewUserNotification;
use Illuminate\Notifications\Notification;

class SendWelcomeMailListener
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
     * @param  \App\Events\NewUserCreatedEvent  $event
     * @return void
     */
    public function handle( $event)
    {

        $admins = User::find(1);

        Mail::to($event->user->email)->send(new UserCreatedMail($event->user));
    }
}
