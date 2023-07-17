<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from_wallet',
        'to_wallet',
        'market_id',
        'type',
        'department',
        'side',
        'tracking_no',
        'price',
        'volume',
        'source_fee',
        'total',
        'receive',
        'fee',
        'meta',
        'initiator_payload',
        'confirmation_payload',
        'status',
    ];

    public function market()
    {
        return $this->belongsTo(Market::class,'market_id','id');
    }

    public function from()
    {
        return $this->belongsTo(Wallet::class,'from_wallet','id');
    }

    public function to()
    {
        return $this->belongsTo(Wallet::class,'to_wallet','id');
    }
}
