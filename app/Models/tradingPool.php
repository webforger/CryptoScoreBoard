<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use app\Models\User;
use App\Models\tradingGoal;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use phpDocumentor\Reflection\Types\Integer;

class tradingPool extends Model
{
    use HasFactory;

    protected $hidden = ['trading_goal_id', 'trading_reward_id', 'trading_type_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function users() : BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @return HasMany
     */
    public function poolUsers() : HasMany
    {
        return $this->hasMany(tradingPoolUser::class);
    }

    /**
     * @return int
     */
    public function poolUsersCount() : int
    {
        return $this->poolUsers->count();
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tradingGoal() : HasOne {
        return $this->hasOne(tradingGoal::class, 'id', 'trading_goal_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tradingReward() : HasOne {
        return $this->hasOne(tradingReward::class, 'id', 'trading_reward_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tradingType() : hasOne {
        return $this->hasOne(tradingType::class, 'id', 'trading_type_id');;
    }

}
