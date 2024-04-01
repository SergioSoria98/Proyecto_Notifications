<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class MessageSent extends Notification
{

    protected $message;

    use Queueable;

    /**
     * Create a new notification instance.
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        /*
        return (new MailMessage)
                    ->greeting($notifiable->name . ",")
                    ->subject('Mensaje recibido desde tu sitio web')
                    ->line('Has recibido un mensaje')
                    ->action('Click aqui para ver el mensaje', route('messages.show', $this->message->id))
                    ->line('Gracias por utilizar nuestra aplicación');
                    */
        return (new MailMessage)->view(
            'emails.notification', [
                'msg' => $this->message,
                'user' => $notifiable
                ]
        )->subject('Mensaje recibido desde Aprendible');


    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray($notifiable)
    {
        return [
            'link' => route('messages.show', $this->message->id),
            'text' => "Has recibido un mensaje de " . $this->message->sender->name
        ];
    }
}
