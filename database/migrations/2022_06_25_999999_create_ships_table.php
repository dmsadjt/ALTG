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
            $table->timestamps();

            $table->string('name');
            $table->bigInteger('hull_id');
            $table->string('notes')->default('No explanations yet, stay tuned!');
            $table->bigInteger('faction_id');
            $table->bigInteger('rarity_id');
            $table->bigInteger('position_id');
            $table->bigInteger('template_id')->nullable();
            $table->string('sprite')->default('ships/img/sprite/no-sprite.png');
            $table->string('chibi_sprite')->default('ships/img/chibi/no-sprite.png');
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
