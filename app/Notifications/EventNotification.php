<?php

namespace App\Notifications;

use App\Event;
use Carbon\Carbon;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class EventNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Event $event)
    {
        $this->event = $event;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
       // return ['mail'];
        return ['database'];
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
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
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
			'personal_information_id' => $this->event->personal_information_id,
			'event' => $this->event->id,
			'nombre' => $this->event->title,
			'asunto' => $this->event->description,
			'email' => $this->event->email,
			'phone' => $this->event->phone,
			'start' => $this->event->start,
			//'end' => $this->event->end,
			'time' => Carbon::now()->diffForHumans(),
        ];
    }
}
