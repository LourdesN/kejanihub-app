<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model implements \OwenIt\Auditing\Contracts\Auditable
{
    use \OwenIt\Auditing\Auditable;
    public $table = 'units';

    public $fillable = [
        'house_id',
        'unit_number',
        'monthly_rent',
        'unit_status'
    ];

    protected $casts = [
        'unit_number' => 'string',
        'unit_status' => 'string'
    ];

    public static array $rules = [
        'house_id' => 'required',
        'unit_number' => 'required|string|max:100',
        'monthly_rent' => 'required',
        'unit_status' => 'required|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    public function house()
    {
    return $this->belongsTo(House::class);
   } 
       public function leases()
        {
            return $this->hasMany(Lease::class);
        }
    
        public function tenants()
        {
            return $this->hasMany(Tenant::class);
        }   
}
