<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     *
     * @param \Illuminate\Console\Scheduling\Schedule $schedule
     */
    protected function schedule(Schedule $schedule)
    {
        // Schedule the command to push categories from Project 2 to Project 1
        $schedule->command('app:push-categories-to-project1')
            ->hourly()
            ->withoutOverlapping(); // Avoid overlapping runs of the command

        // Add any additional commands to schedule here.
        // For example, scheduling other commands as per your application needs:
        // $schedule->command('another:command')->daily();
    }

    /**
     * Register the commands for the application.
     */
    protected function commands()
    {
        // Load custom command classes from the 'Commands' directory
        $this->load(__DIR__ . '/Commands');

        // Include console routes file (if any)
        require base_path('routes/console.php');
    }
}
