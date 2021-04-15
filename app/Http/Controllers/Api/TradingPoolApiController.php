<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\tradingPool;
use Illuminate\Http\Request;

class TradingPoolApiController extends Controller
{
    CONST TRADING_POOLS_PER_PAGE = 20;

    /**
     * Fetch every trading Pool and return it with pagination
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetch() : \Illuminate\Http\JsonResponse {
        return response()
            ->json(
                tradingPool::with(['tradingGoal.coin','tradingReward','tradingType', 'tradingGoal.tradingPeriod']
                )
            ->paginate($this::TRADING_POOLS_PER_PAGE)
        );
    }
}
