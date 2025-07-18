<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Tenant extends Model implements \OwenIt\Auditing\Contracts\Auditable
{
    use \OwenIt\Auditing\Auditable;
    use Notifiable;
    
    public $table = 'tenants';

    public $fillable = [
        'first_name',
        'last_name',
        'phone_number',
        'id_number',
        'email'
    ];

    protected $casts = [
        'first_name' => 'string',
        'last_name' => 'string',
        'email' => 'string'
    ];

    public static array $rules = [
        'first_name' => 'required|string|max:100',
        'last_name' => 'required|string|max:100',
        'phone_number' => 'required',
        'id_number' => 'required',
        'email' => 'nullable|string|max:100',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
