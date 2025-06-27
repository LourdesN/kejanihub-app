<?php

namespace App\Repositories;

use App\Models\Tenant;
use App\Repositories\BaseRepository;

class TenantRepository extends BaseRepository
{
    protected $fieldSearchable = [
        'first_name',
        'last_name',
        'phone_number',
        'id_number',
        'email'
    ];

    public function getFieldsSearchable(): array
    {
        return $this->fieldSearchable;
    }

    public function model(): string
    {
        return Tenant::class;
    }
}
