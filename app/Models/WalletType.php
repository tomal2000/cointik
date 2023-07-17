<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class WalletType extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'display_name',
        'slug',
        'code',
        'logo',
        'is_crypto',
        'status',
    ];

    public function wallets()
    {
        return $this->hasMany(Wallet::class,'wallet_type_id','id');
    }


    /**
     * Scope a query to only include popular users.
     */
    public function scopePrimary(Builder $query): void
    {
        $query->where('code','ngn')->where('status','active')->where('is_crypto',false);
    }

    /**
     * Scope a query to only include popular users.
     */
    public function scopeCrypto(Builder $query): void
    {
        $query->where('code','!=','ngn')->where('status','active')->where('is_crypto',true);
    }

    /**
     * Scope a query to only include popular users.
     */
    public function scopeAvailablecrypto(Builder $query,$id): void
    {
        $query->where('id',$id)->where('status','active')->where('is_crypto',true);
    }

    public function user_assign()
    {
        return $this->hasOne(WalletTypeAssign::class,'wallet_type_id','id');
    }
}
