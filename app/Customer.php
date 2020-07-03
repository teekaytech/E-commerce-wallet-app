<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public function wallet() {
        return $this->hasOne(Wallet::class);
    }
}
