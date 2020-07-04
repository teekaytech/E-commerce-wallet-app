<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function wallet() {
        return $this->hasOne(Wallet::class);
    }

    public function preload_transaction() {
        return $this->hasMany(PaystackTransaction::class);
    }
}
