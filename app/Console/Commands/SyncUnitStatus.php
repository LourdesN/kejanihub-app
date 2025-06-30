<?php

namespace App\Console\Commands;

use App\Models\Unit;
use Illuminate\Console\Command;

class SyncUnitStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:sync-unit-status';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
   public function handle()
{
    $units = Unit::all();

    foreach ($units as $unit) {
        if ($unit->leases()->exists()) {
            $unit->unit_status = 'Occupied';
        } else {
            $unit->unit_status = 'Vacant';
        }
        $unit->save();
    }

    $this->info('Unit statuses synchronized successfully.');
   }

}
