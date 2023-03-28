<?php

namespace App\Listeners;

use App\Notifications\VerifiedEmail;
use Illuminate\Auth\Events\Verified;
use Illuminate\Contracts\Auth\MustVerifyEmail;

class SendEmailVerifiedNotification
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(Verified $event)
    {
        if ($event->user instanceof MustVerifyEmail && $event->user->hasVerifiedEmail()) {
            $event->user->notify(new VerifiedEmail);
        }
    }
}
