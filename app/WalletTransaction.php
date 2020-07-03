<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $fillable = [
        'sender_id', 'receiver_id', 'amount',
    ];
    //
}
