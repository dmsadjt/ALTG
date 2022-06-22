<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRaritiesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rarities', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('rarity_name');
            $table->string('rarity_tag');
            $table->string('rarity_slug');
            $table->string('rarity_image');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('rarities');
    }
}
