<?php

namespace App\Repositories;

use App\Models\Unit;
use App\Repositories\BaseRepository;

class UnitRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'house_id',
        'unit_number',
        'monthly_rent',
        'unit_status'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Unit::class;
    }
}
