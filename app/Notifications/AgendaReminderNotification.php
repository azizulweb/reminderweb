<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class AgendaReminderNotification extends Notification
{
        use Queueable;

    protected $agenda;

    public function __construct($agenda)
    {
        $this->agenda = $agenda;
    }

    public function via($notifiable)
    {
        return ['database']; // Menyimpan notifikasi di database
    }

    public function toDatabase($notifiable)
    {
        return [
            'nama_kegiatan' => $this->agenda->nama_kegiatan,
            'tanggal_kegiatan' => $this->agenda->tanggal_kegiatan,
        ];
    }

    public function toArray($notifiable)
    {
        return [
            'nama_kegiatan' => $this->agenda->nama_kegiatan,
            'tanggal_kegiatan' => $this->agenda->tanggal_kegiatan,
        ];
    }
}
