<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coin extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'alias'];
    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function pairs()
    {
        return $this->belongsTo(Pair::class);
    }
}
