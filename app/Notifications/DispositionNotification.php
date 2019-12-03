<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;


class DispositionNotification extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    protected $sender, $path;
    public function __construct($sender, $path)
    {
        $this->sender = $sender;
        $this->path = $path;
    }
    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', 'broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
     //FORM DATA YANG DISIMPAN KE DALAM DATABASE
     public function toDatabase($notifiable)
     {
        return [
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
            'message' => 'Mohon Untuk di Tidak Lanjuti',
            'path' => $this->path,
        ];
     }

     //FORM DATA YANG AKAN DI BROADCAST
     public function toBroadcast($notifiable)
     {
        return new BroadcastMessage([
            'sender_id' => $this->sender->id,
            'sender_name' => $this->sender->name,
            'message' => 'Mohon Untuk di Tidak Lanjuti',
            'path' => $this->path,
        ]);
     }
}
