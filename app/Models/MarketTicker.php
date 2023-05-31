<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MarketTicker extends Model
{

    protected $fillable = [
        'market_id',
        'buy',
        'sell',
        'low',
        'high',
        'open',
        'vol',
        'is_active',
    ];
    use HasFactory;
}
