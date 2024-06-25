<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class StatusPendaftaranInstruktur extends Notification implements ShouldQueue
{
    use Queueable;

    protected $status;
    protected $pelatihan;
    
    /**
     * Create a new notification instance.
     */
    public function __construct($status, $pelatihan = null)
    {
        $this->status = $status;
        $this->pelatihan = $pelatihan;
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
        if ($this->status == 'gagal') {
            return (new MailMessage)
                    ->greeting('Halo!')
                    ->line('Mohon maaf, pendaftaran anda tidak diterima karena tidak memenuhi syarat.')
                    ->line('Silahkan coba lagi di periode berikutnya.');
        } else if ($this->status == 'proses') {
            return (new MailMessage)
                    ->greeting('Halo!')
                    ->line('Anda lolos seleksi, Silahkan tunggu konfirmasi selanjutnya.')
                    ->line('Mohon tunggu konfirmasi selanjutnya.');
        } else {
            return (new MailMessage)
                    ->greeting('Halo!')
                    ->line('Selamat, Anda telah diterima sebagai Instruktur di pelatihan ' . $this->pelatihan . '.')
                    ->line('Silahkan cek informasi selengkapnya di dashboard anda.');
        }
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
