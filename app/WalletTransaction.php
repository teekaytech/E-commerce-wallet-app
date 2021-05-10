<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WalletTransaction extends Model
{
    protected $fillable = [
        'sender_id', 'receiver_id', 'amount',
    ];

    public function initiator() {
        return $this->belongsTo(Customer::class, 'sender_id');
    }

    public function receiver() {
        return $this->belongsTo(Customer::class, 'receiver_id');
    }
}
