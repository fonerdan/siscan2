<?php
namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\PaymentCommitment;
use Carbon\Carbon;

class Paid extends Notification
{
    use Queueable;

    protected $paymentCommitment;

    /**
     * Create a new notification instance.
     *
     * @param PaymentCommitment $paymentCommitment
     */
    public function __construct(PaymentCommitment $paymentCommitment)
    {
        $this->paymentCommitment = $paymentCommitment;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param object $notifiable
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param object $notifiable
     * @return MailMessage
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->line('Recuerda que tienes un compromiso de pago programado para el siguiente cliente:')
            ->line('Fecha de Pago: ' . $this->paymentCommitment->amount_due_date->format('Y-m-d'))
            ->action('Ver Detalles', url('/clients/' . $notifiable->id))
            ->line('¡Gracias por usar nuestra aplicación!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @param object $notifiable
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'client' => $this->paymentCommitment->client->name,
            'amount' => $this->paymentCommitment->amount,
            'date' => Carbon::parse($this->paymentCommitment->date)->format('d-m-Y'),
            'time' => Carbon::now()->diffForHumans(),
        ];
    }
}
