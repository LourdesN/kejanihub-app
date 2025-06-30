<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use RentDueReminder;

class Kernel extends ConsoleKernel
{
    /**
     * Define the application's command schedule.
     */
    protected function schedule(Schedule $schedule)
{
    $schedule->call(function () {
        $leases = \App\Models\Lease::with(['tenant', 'unit'])->get();

        foreach ($leases as $lease) {
            $lease->tenant->notify(new RentDueReminder(
                $lease->tenant, 
                $lease->unit, 
                $lease->unit->monthly_rent
            ));
        }
    })->monthlyOn(1, '08:00'); // 1st of every month at 8 AM
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
