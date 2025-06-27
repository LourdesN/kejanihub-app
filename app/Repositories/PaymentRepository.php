<?php

namespace App\Repositories;

use App\Models\Payment;
use App\Repositories\BaseRepository;

class PaymentRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'lease_id',
        'payment_date',
        'amount_paid',
        'payment_method',
        'transaction_code',
        'month_paid_for'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Payment::class;
    }
}
