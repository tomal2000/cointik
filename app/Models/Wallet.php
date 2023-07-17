<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    use HasFactory;

    protected $fillable = [
        'wallet_type_id',
        'wallet_no',
        'user_id',
        'address_id',
        'address',
        'balance',
        'meta',
        'status',
    ];

    public function type()
    {
        return $this->belongsTo(WalletType::class,'wallet_type_id','id');
    }
}
