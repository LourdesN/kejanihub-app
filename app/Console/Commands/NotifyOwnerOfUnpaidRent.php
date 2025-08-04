<?php
namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Tenant;
use App\Models\User; // assuming owner is a User
use RentDueReminder;

class NotifyOwnerOfUnpaidRent extends Command
{
    protected $signature = 'notify:owner-unpaid-rent';
    protected $description = 'Notifies the owner about tenants who haven’t paid rent';

    public function handle()
{
    $users = \App\Models\User::all(); // all users in the system
    $tenants = \App\Models\Tenant::with('unit')->where('rent_status', '!=', 'paid')->get();

    foreach ($tenants as $tenant) {
        foreach ($users as $user) {
            $user->notify(new RentDueReminder($tenant, $tenant->unit, $tenant->unit->rent_amount));
        }
    }

    $this->info('Unpaid tenant notifications sent to all users.');
}

}
