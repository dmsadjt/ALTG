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
            $table->string('roles')->nullable();
            $table->bigInteger('position_id')->nullable();
            $table->string('notes')->default('There are no notes yet');
            $table->bigInteger('faction_id');
            $table->bigInteger('rarity_id');

            $table->string('sprite')->nullable();
            $table->string('chibi_sprite')->nullable();

            $table->integer('mob_911');
            $table->integer('mob_1213');
            $table->integer('mob_14');
            $table->integer('boss_911');
            $table->integer('boss_1213');
            $table->integer('boss_14');

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
