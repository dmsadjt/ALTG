<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHullsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hulls', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('hull_name');
            $table->string('hull_tag');
            $table->string('hull_slug');
            $table->string('hull_img');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hulls');
    }
}
