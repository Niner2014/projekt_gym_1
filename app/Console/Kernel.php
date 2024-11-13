<?php
namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Models\ListeKlienci;
use Carbon\Carbon;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // Zadanie, które ustawia status 'aktywny' na false po 30 dniach od daty zapisania
        $schedule->call(function () {
            ListeKlienci::where('data_zapisania', '<', Carbon::now()->subDays(30))
                ->update(['aktywny' => false]);
        })->daily(); // Wykonuje się codziennie
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
