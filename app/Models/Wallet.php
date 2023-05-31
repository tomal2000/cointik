<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends \Bavix\Wallet\Models\Wallet
{
    use HasFactory;

    /**
     * Get the phone associated with the user.
     */
    public function walletAssign(): HasOne
    {
        return $this->hasOne(WalletTypeAssign::class,'wallet_id','id');
    }
}
