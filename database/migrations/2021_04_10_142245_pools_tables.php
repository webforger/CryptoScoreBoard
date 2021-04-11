<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PoolsTables extends InitProjectDatabase
{
    CONST DB_TRADING_GOALS_NAME = 'trading_goals';
    CONST DB_TRADING_TYPES_NAME = 'trading_types';
    CONST DB_TRADING_PERIODS_NAME = 'trading_periods';
    CONST DB_TRADING_REWARDS_NAME = 'trading_rewards';
    CONST DB_PNL_NAME = 'pnls';
    CONST DB_TRADES_NAME = 'trades';
    CONST DB_COINS_NAME = 'coins';
    CONST DB_PAIRS_NAME = 'pairs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this::DB_TRADING_GOALS_NAME, function (Blueprint $table) {
            $table->id();
            $table->double('value');
            $table->unsignedBigInteger('coin_id');
            $table->unsignedBigInteger('trading_period_id');
        });

        Schema::create($this::DB_TRADING_TYPES_NAME, function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->unsignedBigInteger('pair_id');
        });

        Schema::create($this::DB_TRADING_PERIODS_NAME, function (Blueprint $table) {
            $table->id();
            $table->dateTime('period_start');
            $table->dateTime('period_end');
            $table->timestamps();
        });

        Schema::create($this::DB_TRADING_REWARDS_NAME, function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->longText('description');
        });

        Schema::create($this::DB_PNL_NAME, function (Blueprint $table) {
            $table->id();
            $table->double('value');
            $table->unsignedBigInteger('trading_pool_user_id');
            $table->unsignedBigInteger('coin_id');
            $table->timestamps();
        });

        Schema::create($this::DB_TRADES_NAME, function (Blueprint $table) {
            $table->id();
            $table->double('value');
            $table->unsignedBigInteger('trading_pool_user_id');
            $table->unsignedBigInteger('pair_id');
            $table->timestamps();
        });

        Schema::table($this::DB_TRADING_POOLS_NAME, function (Blueprint $table) {
            $table->unsignedBigInteger('trading_period_id')->nullable();
            $table->unsignedBigInteger('trading_reward_id')->nullable();
            $table->unsignedBigInteger('trading_type_id')->nullable();
            $table->unsignedBigInteger('trading_goal_id')->nullable();
        });

        // Add foreign keys
        Schema::table($this::DB_TRADING_GOALS_NAME, function (Blueprint $table) {
            $table->foreign('trading_period_id')->references('id')->on($this::DB_TRADING_PERIODS_NAME);
        });

        Schema::table($this::DB_TRADING_POOLS_NAME, function (Blueprint $table) {
            $table->foreign('trading_reward_id')->references('id')->on($this::DB_TRADING_REWARDS_NAME);
            $table->foreign('trading_type_id')->references('id')->on($this::DB_TRADING_TYPES_NAME);
            $table->foreign('trading_goal_id')->references('id')->on($this::DB_TRADING_GOALS_NAME);
        });

        Schema::table($this::DB_PNL_NAME, function (Blueprint $table) {
            $table->foreign('trading_pool_user_id')->references('id')->on($this::DB_TRADING_POOLS_USERS_NAME);
            $table->foreign('coin_id')->references('id')->on($this::DB_COINS_NAME);
        });

        Schema::table($this::DB_TRADES_NAME, function (Blueprint $table) {
            $table->foreign('trading_pool_user_id')->references('id')->on($this::DB_TRADING_POOLS_USERS_NAME);
            $table->foreign('pair_id')->references('id')->on($this::DB_PAIRS_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this::DB_TRADES_NAME, function (Blueprint $table) {
            $table->dropForeign(['trading_pool_user_id']);
            $table->dropForeign(['pair_id']);
            $table->dropColumn('trading_pool_user_id');
        });

        Schema::table($this::DB_PNL_NAME, function (Blueprint $table) {
            $table->dropForeign(['trading_pool_user_id']);
            $table->dropForeign(['coin_id']);
            $table->dropColumn('trading_pool_user_id');
        });

        Schema::table($this::DB_TRADING_REWARDS_NAME, function (Blueprint $table) {
            $table->dropForeign(['trading_pool_id']);
            $table->dropColumn('trading_pool_id');
        });

        Schema::table($this::DB_TRADING_PERIODS_NAME, function (Blueprint $table) {
            $table->dropForeign(['trading_goal_id']);
            $table->dropColumn('trading_goal_id');
        });

        Schema::table($this::DB_TRADING_TYPES_NAME, function (Blueprint $table) {
            $table->dropForeign(['trading_pool_id']);
            $table->dropForeign(['pair_id']);
            $table->dropColumn('trading_pool_id');
        });

        Schema::table($this::DB_TRADING_GOALS_NAME, function (Blueprint $table) {
            $table->dropForeign(['trading_pool_id']);
            $table->dropForeign(['coin_id']);
            $table->dropColumn('trading_pool_id');
        });

        Schema::dropIfExists($this::DB_TRADING_PERIODS_NAME);
        Schema::dropIfExists($this::DB_TRADING_TYPES_NAME);
        Schema::dropIfExists($this::DB_TRADING_REWARDS_NAME);
        Schema::dropIfExists($this::DB_TRADING_GOALS_NAME);
        Schema::dropIfExists($this::DB_TRADES_NAME);
        Schema::dropIfExists($this::DB_PNL_NAME);
    }
}
