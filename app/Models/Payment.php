<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $table = 'payments';

    public $fillable = [
        'lease_id',
        'payment_date',
        'amount_paid',
        'payment_method',
        'transaction_code',
        'month_paid_for'
    ];

    protected $casts = [
        'payment_date' => 'date',
        'payment_method' => 'string',
        'transaction_code' => 'string',
        'month_paid_for' => 'string'
    ];

    public static array $rules = [
        'lease_id' => 'required',
        'payment_date' => 'required',
        'amount_paid' => 'required',
        'payment_method' => 'required|string|max:100',
        'transaction_code' => 'nullable|string|max:100',
        'month_paid_for' => 'required|string|max:255',
        'created_at' => 'nullable',
        'updated_at' => 'nullable'
    ];

    
}
