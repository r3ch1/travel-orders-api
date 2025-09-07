<?php

namespace App\Modules\TravelOrder\Notifications;

use App\Models\TravelOrder;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class TravelOrderFinalized extends Notification implements ShouldQueue
{
    use Queueable;

    protected $model;
    /**
     * Create a new notification instance.
     */
    public function __construct(TravelOrder $model)
    {
        $this->model = $model;
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
            ->greeting('Hello, '.$notifiable->name)
            ->line('Your travel order(#'.$this->model->id.') was '.$this->model->status)
            ->action('Click here to see travel order details', route('travel-orders.show', ['travel_order' => $this->model->id]))
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
