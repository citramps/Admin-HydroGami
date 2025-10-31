<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        // Cleanup semua misi expired setiap hari jam 00:01
        $schedule->call(function () {
            app(\App\Http\Controllers\MisiController::class)->cleanupAllExpiredMissions();
        })->dailyAt('00:01');

        // Reset misi mingguan setiap Senin jam 00:10
        $schedule->call(function () {
            app(\App\Http\Controllers\MisiController::class)->resetWeeklyMissions();
        })->weeklyOn(1, '00:10'); // Setiap Senin jam 00:10
    }

    protected function commands()
    {
        $this->load(__DIR__.'/Commands');
        require base_path('routes/console.php');
    }
}