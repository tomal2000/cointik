<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WalletTypeAssign extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = [
        'wallet_id',
        'wallet_type_id',
    ];

    /**
     * Get the user that owns the phone.
     */
    public function type(): BelongsTo
    {
        return $this->belongsTo(WalletType::class,'wallet_type_id','id');
    }
}
