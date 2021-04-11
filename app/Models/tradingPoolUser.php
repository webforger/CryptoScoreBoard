<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\Pivot;

class tradingPoolUser extends Pivot
{
    use HasFactory;
    public $timestamps = false;

    /**
     * @return hasMany
     */
    public function trades() : hasMany {
        return $this->hasMany(trade::class, 'trading_pool_user_id');
    }

    /**
     * @return belongsTo
     */
    public function user() : belongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * @return belongsTo
     */
    public function pool() : belongsTo
    {
        return $this->belongsTo(tradingPool::class);
    }
}
