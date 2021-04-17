<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class tradingType extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $fillable = ['pair_id','name'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pool() : BelongsTo {
        return $this->belongsTo(tradingPool::class);
    }


    /**
     * @return BelongsToMany
     */
    public function pairs() : BelongsToMany {
        return $this->belongsToMany(Pair::class);
    }
}
