<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class InitProjectDatabase extends Migration
{
    CONST DB_TRADING_POOLS_NAME = 'trading_pools';
    CONST DB_TRADING_POOLS_USERS_NAME = 'trading_pool_user';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this::DB_TRADING_POOLS_NAME, function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->timestamps();
        });

        Schema::create($this::DB_TRADING_POOLS_USERS_NAME, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('trading_pool_id');
        });

        Schema::table($this::DB_TRADING_POOLS_USERS_NAME, function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('trading_pool_id')->references('id')->on($this::DB_TRADING_POOLS_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this::DB_TRADING_POOLS_USERS_NAME, function (Blueprint $table) {
            $table->dropForeign(['user_id']);
            $table->dropForeign(['trading_pool_id']);
            $table->dropColumn('user_id');
            $table->dropColumn('trading_pool_id');
        });

        Schema::dropIfExists($this::DB_TRADING_POOLS_USERS_NAME);
        Schema::dropIfExists($this::DB_TRADING_POOLS_NAME);
    }
}
