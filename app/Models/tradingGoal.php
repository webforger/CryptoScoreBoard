<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tradingPool;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class tradingGoal extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pool() : BelongsTo {
        return $this->belongsTo(tradingPool::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tradingPeriod() : hasOne {
        return $this->hasOne(tradingPeriod::class, 'id', 'trading_period_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coin() : hasOne {
        return $this->hasOne(Coin::class, 'id', 'coin_id');
    }
}
