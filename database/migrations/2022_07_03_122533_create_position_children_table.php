<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePositionChildrenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('position_children', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->string('position_name');
            $table->string('position_category');
            $table->string('position_slug');
            $table->string('position_image');
            $table->string('explanation')->default('Nothing here yet, stay tuned!');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('position_children');
    }
}
