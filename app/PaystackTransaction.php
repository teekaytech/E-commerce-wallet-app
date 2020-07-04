<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaystackTransaction extends Model
{
    protected $fillable = [
        'customer_id', 'reference', 'status', 'amount', 'paid_at'
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
