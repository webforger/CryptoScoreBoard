<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pair extends Model
{
    use HasFactory;

    public function coin1()
    {
        return $this->hasOne('coin1');
    }

    public function coin2()
    {
        return $this->hasOne('coin2');
    }
}
