<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use OwenIt\Auditing\Contracts\Auditable;

class House extends Model implements Auditable
{
    use \OwenIt\Auditing\Auditable;
    
    public $table = 'houses';

    public $fillable = [
        'name',
        'location',
        'number_of_units'
    ];

    protected $casts = [
        'name' => 'string',
        'location' => 'string'
    ];

    public static array $rules = [
        'name' => 'required|string|max:100',
        'location' => 'required|string|max:150',
        'number_of_units' => 'required',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
