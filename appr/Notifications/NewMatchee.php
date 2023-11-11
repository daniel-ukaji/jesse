<?php

namespace App\Notifications;

use App\Models\Matches;
use Illuminate\Support\Str;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class NewMatchee extends Notification implements ShouldQueue
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
            ->greeting("New match request from {$this->matches->user->first_name}")
            ->line("{$this->matches->user->first_name}'s Bio:")
            ->line(Str::limit($this->matches->user->extra, 80))
            ->action('Go to Lightning Speed Matchmaker', url('/match'))
            ->line("Dear {$this->matches->matched_user->first_name}, One of our members, {$this->matches->user->first_name} expressed interest in your profile and would love to meet. Please login to your profile and go to view matches and either Accept or Decline the member. If you accept the match, our professional will contact you by phone and suggest a few steps to move forward to get connected with your match. Looking forward to hearing from you soon");
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
