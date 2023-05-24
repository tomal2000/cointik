<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Bavix\Wallet\Traits\HasWallet;
use Bavix\Wallet\Interfaces\Wallet;
use Bavix\Wallet\Traits\CanConfirm;
use Bavix\Wallet\Traits\HasWallets;
use Bavix\Wallet\Traits\HasWalletFloat;
use Bavix\Wallet\Interfaces\Confirmable;
use Bavix\Wallet\Interfaces\WalletFloat;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Wallet, WalletFloat, Confirmable
{
    use HasApiTokens, HasFactory, Notifiable, HasWallet, HasWallets, HasWalletFloat, CanConfirm;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_key',
        'first_name',
        'last_name',
        'email',
        'phone_country_code',
        'phone',
        'email_verified_at',
        'phone_verified_at',
        'password',
        'pin',
        'lc_country_id',
        'kyc_status',
        'status',
        'wrong_attempt',
        'meta',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'phone_verified_at' => 'datetime',
    ];

    public function deposit_account()
    {
        return $this->hasOne(DepositAccount::class,'user_id','id');
    }

    public function beneficiaries()
    {
        return $this->hasMany(Beneficiary::class,'user_id','id');
    }
}
