<?php

use Illuminate\Notifications\Notification;

class RentDueReminder extends Notification
{
    public function __construct(public $tenant, public $unit, public $amount) {}

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Tenant Rent Due',
            'message' => "Tenant {$this->tenant->first_name} has not paid rent of Ksh {$this->amount} for Unit {$this->unit->unit_number}.",
        ];
    }
}

