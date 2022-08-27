<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class GearTemplate extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gear_template', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->integer('template_id');
            $table->integer('gear_id');
            $table->string('gear_category')->default('General');
            $table->string('gear_slot')->default('1');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('gear_template');

    }
}
