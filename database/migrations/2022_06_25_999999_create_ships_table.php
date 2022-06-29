<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ships', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('hull_id');
            $table->string('notes')->default('There are no notes yet');
            $table->bigInteger('faction_id');
            $table->bigInteger('rarity_id');

            $table->string('sprite')->default('no-sprite.png');
            $table->string('chibi_sprite')->default('no-sprite.png');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ships');
    }
}
