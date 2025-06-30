<?php

use Illuminate\Notifications\Notification;
use Illuminate\Notifications\Messages\DatabaseMessage;

class RentDueReminder extends Notification
{
    public function __construct(public $tenant, public $unit, public $amount) {}

    public function via($notifiable)
    {
        return ['database']; // Only store in the DB
    }

    public function toDatabase($notifiable)
    {
        return [
            'title' => 'Rent Due',
            'message' => "Dear {$this->tenant->first_name}, your rent of Ksh {$this->amount} for unit {$this->unit->unit_number} is due this month.",
        ];
    }
}

