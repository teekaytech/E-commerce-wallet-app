<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = [
        'code', 'balance',
    ];

    public function customer() {
        return $this->belongsTo(Customer::class, 'customer_id');
    }
}
