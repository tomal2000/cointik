<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BuySellAction extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'from_wallet',
        'to_wallet',
        'type',
        'section',
        'command',
        'tracking_no',
        'meta',
        'initiator_payload',
        'confirmation_payload',
        'status',
    ];
}
