<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MpesaPayment extends Model
{
    use HasFactory;

    protected $fillable = [
    'transaction_code',
    'phone_number',
    'amount',
    'account_reference',
    'payment_date',
    'raw_data',
];
    protected $casts = [
        'payment_date' => 'datetime',
        'raw_data' => 'array', // Store raw data as JSON
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class, 'phone_number', 'phone_number');
    }

    public function lease()
    {
        return $this->tenant->lease ?? null; // Assuming Tenant has a lease relationship
    }   
    public function payments()
    {
        return $this->hasMany(Payment::class, 'transaction_code', 'transaction_code');
    }
    
}
