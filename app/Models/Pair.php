<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coinFrom()
    {
        return $this->hasOne(Coin::class, 'id', 'coin1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coinTo()
    {
        return $this->hasOne(Coin::class, 'id', 'coin2');
    }

    /**
     * @return string
     */
    public function ticker() : string {
        return $this->coinFrom->alias . '/' . $this->coinTo->alias;
    }
}
