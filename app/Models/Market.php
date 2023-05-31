<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Market extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'name',
        'base_unit',
        'quote_unit',
        'is_active',
    ];

    public function ticker(): HasOne
    {
        return $this->hasOne(MarketTicker::class,'market_id','id');
    }

    public function scopeActive(Builder $query): void
    {
        $query->where('is_active', true);
    }
}
