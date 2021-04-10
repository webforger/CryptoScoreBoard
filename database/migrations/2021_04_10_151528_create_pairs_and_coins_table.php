<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePairsTable extends Migration
{
    CONST DB_PAIRS_NAME = 'pairs';
    CONST DB_COINS_NAME = 'coins';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this::DB_PAIRS_NAME, function (Blueprint $table) {
            $table->id();
            $table->double('value');
            $table->timestamps();
        });

        Schema::create($this::DB_COINS_NAME, function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias');
            $table->timestamps();
        });

        Schema::table($this::DB_PAIRS_NAME, function (Blueprint $table) {
            $table->foreign('coin1')->references('id')->on($this::DB_COINS_NAME);
            $table->foreign('coin2')->references('id')->on($this::DB_COINS_NAME);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table($this::DB_PAIRS_NAME, function (Blueprint $table) {
            $table->dropForeign(['coin1']);
            $table->dropColumn('coin1');
            $table->dropForeign(['coin2']);
            $table->dropColumn('coin2');
        });

        Schema::dropIfExists($this::DB_PAIRS_NAME);
        Schema::dropIfExists($this::DB_COINS_NAME);
    }
}
