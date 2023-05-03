<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use NotificationChannels\Telegram\TelegramMessage;

class TelegramMsg extends Notification
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
        return ["telegram"];
    }

    public function toTelegram($notifiable)
    {
        return TelegramMessage::create()
            ->to(env('TELEGRAM_CHAT_ID'))
            ->content("Поступила заявка с сайта!\n Имя клиента: {$notifiable->input('name')}\n" .
                "Номер телефона: {$notifiable->input('phone')} \n" .
                "Эл.почта: {$notifiable->input('email')} \n\n" .
                "Сообщение от клиента: \n {$notifiable->input('message')}"
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
