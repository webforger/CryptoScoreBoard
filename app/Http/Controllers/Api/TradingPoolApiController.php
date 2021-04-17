<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\tradingPool;
use App\Traits\ApiResponser;
use Illuminate\Http\Request;

class TradingPoolApiController extends Controller
{
    use ApiResponser;
    CONST TRADING_POOLS_PER_PAGE = 20;

    /**
     * Fetch one trading Pool and return it with it's relations
     * @return \Illuminate\Http\JsonResponse
     */
    public function fetchOne(Request $request) : \Illuminate\Http\JsonResponse {
        return response()
            ->json(
                tradingPool::with(['tradingGoal.coin','tradingReward','tradingType', 'tradingGoal.tradingPeriod', 'users'])->find($request->id)
                );
    }

    /**
     * Fetch one trading Pool and return it with it's relations
     * @return \Illuminate\Http\JsonResponse
     */
    public function join(Request $request) : \Illuminate\Http\JsonResponse {
        $tradingPool = tradingPool::findOrFail($request->id);
        if( $tradingPool->users->contains(auth()->user()->id)) {
            return $this->error('User already in the pool', 409);

        } else {
            $tradingPool->users()->attach(auth()->user()->id);
            return $this->success($tradingPool, 'User attached successfully');
        }
    }
    
    /**
     * Fetch every trading Pool and return it with pagination and it's relations
     * @return \Illuminate\Http\JsonResponse
     */
    public function index() : \Illuminate\Http\JsonResponse {
        return response()
            ->json(
                tradingPool::with(['tradingGoal.coin','tradingReward','tradingType', 'tradingGoal.tradingPeriod', 'users']
                )
                    ->paginate(10)
            );
    }
}
