<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Config;

class VerifiedEmail extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        $dashboardUrl = $this->dashboardUrl();

        return $this->buildMailMessage($dashboardUrl);
    }

    protected function buildMailMessage($url)
    {
        return (new MailMessage)
            ->subject(Lang::get('Welcome to Nhire Group'))
            ->line(Lang::get('Thank you for registering yourself on this platform. Please click the button below to and check your dashboard.'))
            ->action(Lang::get('Your Dashboard'), $url)
            ->line(Lang::get('If you did not create an account, no further action is required.'));
    }

    protected function dashboardUrl()
    {
        return URL::temporarySignedRoute(
            'user.dashboard',
            Carbon::now()->addMinutes(Config::get('auth.verification.expire', 60))
        );
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            //
        ];
    }
}
