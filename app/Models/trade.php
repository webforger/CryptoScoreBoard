<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class trade extends Model
{
    use HasFactory;

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function tradingPoolUser() : BelongsTo {
        return $this->belongsTo(tradingPoolUser::class);
    }

    protected static function boot() : void {
        parent::boot();
        trade::saved(function (trade $model) {
            if ($model->tradingPoolUser->pnl()->exists()) {
                /** @var pnl $pnl */
                $pnl = pnl::find($model->tradingPoolUser->pnl->id);
                $pnl->value = trade::calculatePnl($model->tradingPoolUser->id);
                $pnl->save();
            } else {
                $pnl = pnl::create([
                    'trading_pool_user_id' => $model->tradingPoolUser->id,
                    'value' => trade::calculatePnl($model->tradingPoolUser->id)
                ]);
            }

        });
    }

    /**
     * @param int $tradingPoolUserId
     * @return float
     * TODO : Move pnl calculation responsability to a dedicated controller + check dates + worker ?
     */
    protected static function calculatePnl(int $tradingPoolUserId) : float {
        $trades = trade::where('trading_pool_user_id', '=', $tradingPoolUserId)->get();
        $pnl = 0;
        foreach ($trades as $trade) {
            $pnl = $pnl + $trade->value;
        }
        return $pnl;
    }

}
