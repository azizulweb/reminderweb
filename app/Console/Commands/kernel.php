<?php

namespace App\Console\Commands;

use App\Models\Agenda;
use Illuminate\Console\Command;

class kernel extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:kernel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    protected function schedule(Agenda $schedule)
        {
            $schedule->command('agenda:reminder')->everyMinute();
        }

}
