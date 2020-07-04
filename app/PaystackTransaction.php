<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaystackTransaction extends Model
{
    protected $fillable = [
        'customer_id', 'reference', 'status', 'amount', 'paid_at'
    ];
}
