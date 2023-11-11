<?php

namespace App\Notifications;

use App\Models\Matches;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewMatch extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(public Matches $matches)
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject("New Match Notification")
            ->greeting("New match request sent to {$this->matches->matched_user->first_name}")
            ->line("{$this->matches->matched_user->first_name}'s Bio:")
            ->line(Str::limit($this->matches->matched_user->extra, 80))
            ->action('Go to Lightning Speed Matchmaker', url('/match'))
            ->line("If {$this->matches->matched_user->first_name} accept's your match request, our professional match maker will contact you via phone to discuss the next step to get connected with your match.");
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
