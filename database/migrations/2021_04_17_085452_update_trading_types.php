<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\tradingType;

class UpdateTradingTypes extends Migration
{

    CONST DB_TRADING_TYPE_PAIRS_NAME = 'trading_type_pair';
    CONST DB_TRADING_TYPES_NAME = 'trading_types';
    CONST DB_PAIRS_NAME = 'pairs';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this::DB_TRADING_TYPE_PAIRS_NAME, function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('trading_type_id');
            $table->unsignedBigInteger('pair_id');
        });

        Schema::table($this::DB_TRADING_TYPE_PAIRS_NAME, function (Blueprint $table) {
            $table->foreign('trading_type_id')->references('id')->on($this::DB_TRADING_TYPES_NAME);
            $table->foreign('pair_id')->references('id')->on($this::DB_PAIRS_NAME);
        });

        Schema::table($this::DB_TRADING_TYPES_NAME, function (Blueprint $table) {
            $table->dropForeign(['pair_id']);
            $table->dropColumn('pair_id');
        });

        tradingType::create([
            'name' => 'Spot'
        ]);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this::DB_TRADING_TYPES_NAME, function (Blueprint $table) {
            $table->unsignedBigInteger('pair_id');
            $table->foreign('pair_id')->references('id')->on($this::DB_PAIRS_NAME);
        });

        Schema::table($this::DB_TRADING_TYPE_PAIRS_NAME, function (Blueprint $table) {
            $table->dropForeign(['trading_type_id']);
            $table->dropForeign(['pair_id']);
            $table->dropColumn('trading_type_id');
            $table->dropColumn('pair_id');
        });
    }
}
