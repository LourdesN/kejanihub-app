<?php

namespace App\Repositories;

use App\Models\House;
use App\Repositories\BaseRepository;

class HouseRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'name',
        'location',
        'number_of_units'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return House::class;
    }
}
