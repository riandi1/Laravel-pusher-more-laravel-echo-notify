<?php

namespace App\Notifications;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\BroadcastMessage;

class MessageSent extends Notification
{
    use Queueable;
    public $message;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message)
    {
        $this->message = $message;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail','database','broadcast'];
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
                    ->error()
                    ->subject('Tienes un nuevo mensaje')
                    ->greeting('Hola Coders')
                    ->line('Para leer tu mensaje haz click en el boton.')
                    ->action('Ver mensaje', route('message.show',$this->message->id))
                    ->line('Hasta a luego');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toDatabase($notifiable)
    {
        $notifiable->notification += 1;
        $notifiable->save();
        return [
            'url' => route('message.show',$this->message->id),
            'message'=> "Has recibido un mensaje de". User::find($this->message->from_user_id)->name
        ];
    }
    public function toBroadcast($notifiable)
    {
       return new BroadcastMessage([]);
    }
}
