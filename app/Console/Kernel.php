<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use App\Console\Commands\NotifyUsersNotLoggedInForMonthCommand;
use App\Jobs\AssignNewOrder;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule): void
    {
        // $schedule->command('inspire')->hourly();
        $schedule->job(new AssignNewOrder())->everyMinute();
        $schedule->command(NotifyUsersNotLoggedInForMonthCommand::class)->daily()->at('10:00');
    }

    /**
     * Register the commands for the application.
     */
    protected function commands(): array
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');

        return [
            \App\Console\Commands\CreateAdminUser::class,
            \App\Console\Commands\NotifyUsersNotLoggedInForMonthCommand::class,

        ];
    }
}
