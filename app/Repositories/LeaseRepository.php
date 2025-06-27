<?php

namespace App\Repositories;

use App\Models\Lease;
use App\Repositories\BaseRepository;

class LeaseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'tenant_id',
        'unit_id',
        'start_date',
        'end_date',
        'deposit_amount',
        'lease_status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Lease::class;
    }
}
