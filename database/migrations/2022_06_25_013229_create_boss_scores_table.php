<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBossScoresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('boss_scores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->unsignedBigInteger('ship_id');
            $table->integer('boss_9_11')->nullable();
            $table->integer('boss_12_13')->nullable();
            $table->integer('boss_14')->nullable();


            $table->index('ship_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('boss_scores');
    }
}
