<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lease extends Model implements \OwenIt\Auditing\Contracts\Auditable
{
     use \OwenIt\Auditing\Auditable;
    public $table = 'leases';

    public $fillable = [
        'tenant_id',
        'unit_id',
        'start_date',
        'end_date',
        'deposit_amount',
        'lease_status'
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'lease_status' => 'string'
    ];

    public static array $rules = [
        'tenant_id' => 'required',
        'unit_id' => 'required',
        'start_date' => 'required',
        'end_date' => 'nullable',
        'deposit_amount' => 'nullable',
        'lease_status' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
    public function unit()
    {
        return $this->belongsTo(Unit::class);
    }

}
