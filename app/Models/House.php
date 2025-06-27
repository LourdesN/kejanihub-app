<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class House extends Model
{
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
