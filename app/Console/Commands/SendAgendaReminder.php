<?php

namespace App\Console\Commands;

use App\Models\Agenda;
use App\Notifications\AgendaReminderNotification;
use Illuminate\Console\Command;
use Carbon\Carbon;

class SendAgendaReminders extends Command
{
    protected $signature = 'agenda:reminder';
    protected $description = 'Kirim notifikasi saat waktu agenda tiba';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        // Ambil agenda yang waktunya dalam 10 menit ke depan
        $agendas = Agenda::where('tanggal_kegiatan', '<=', Carbon::now()->addMinutes(10))
                         ->where('is_done', false) // Agenda belum selesai
                         ->get();

        foreach ($agendas as $agenda) {
            // Kirim notifikasi ke user (misalnya admin)
            $user = \App\Models\User::find(1); // Ganti dengan user yang sesuai
            $user->notify(new AgendaReminderNotification($agenda));
        }
    }
}
