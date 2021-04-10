<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\tradingPool;

class tradingGoal extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pool() {
        return $this->belongsTo(tradingPool::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function period() {
        return $this->hasOne(tradingPeriod::class);
    }
}
