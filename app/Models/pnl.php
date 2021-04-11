<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class pnl extends Model
{
    use HasFactory;
    public $timestamps = false;

    /**
     * @return BelongsTo
     */
    public function tradingPoolUser() : belongsTo {
        return $this->belongsTo(tradingPoolUser::class);
    }
}
