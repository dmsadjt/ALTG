<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSirensTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sirens', function (Blueprint $table) {
            $table->id();

            $table->string('name');
            $table->string('hull');
            $table->integer('level');
            $table->string('armor');
            $table->integer('hp');
            $table->integer('fp')->nullable();
            $table->integer('trp')->nullable();
            $table->integer('aa');
            $table->integer('avi');
            $table->integer('acc');
            $table->integer('eva');
            $table->integer('lck');
            $table->integer('spd');
            $table->string('weakness')->nullable();

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
        Schema::dropIfExists('sirens');
    }
}
