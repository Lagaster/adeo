<?php

namespace App\Notifications;

use App\Models\Contact;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ContactNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */
    public $contact;
    public function __construct(Contact $contact)
    {
        $this->contact = $contact;
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
        return (new MailMessage)
                    ->greeting('Hello Admin')
                    ->line('From: '.$this->contact->name . ' ('.$this->contact->email.')')
                    ->line('Subject: '.$this->contact->subject)
                    ->line($this->contact->message)
                    ->action('View Message', route('messages.show', $this->contact->id))
                    ->line('Thank you for using our application!');

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
