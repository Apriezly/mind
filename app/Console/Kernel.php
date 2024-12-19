<?php

namespace App\Console;

// use App\Models\Dokumen;
// use App\Models\Pengingat;
// use App\Jobs\RemoveDraft;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{

    protected $commands = [
        // Commands\DemoCron::class,
        Commands\DeleteExpiredData::class,
    ];

    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('queue:work')->everyMinute();
        $schedule->command('dokumen:delete-expired-data')->hourly();
        // $schedule->command('demo:cron')->everyMinute();
        // $schedule->job(new \App\Jobs\RemoveDraft)->everyMinute();
        // $schedule->call(function () {
        //     $dokumenKadaluarsa = \App\Models\Dokumen::where('expiration_date', '<=', now()->subMinutes(2))->get();
    
        //     foreach ($dokumenKadaluarsa as $dokumen) {
        //         $dokumen->pengingat()->delete();
        //         $dokumen->delete();
        //     }
        // })->everyMinute(); 

        \Log::info('Scheduler is running');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): void
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
