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
    public function coin1()
    {
        return $this->hasOne('coin1');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function coin2()
    {
        return $this->hasOne('coin2');
    }
}
