<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNormalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('normals', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger('siren_id');
            $table->bigInteger('hull_id');
            $table->integer('level');
            $table->string('armor');
            $table->string('hp');
            $table->integer('fp')->nullable();
            $table->integer('trp')->nullable();
            $table->integer('aa');
            $table->integer('avi');
            $table->integer('acc');
            $table->integer('eva');
            $table->integer('lck');
            $table->integer('spd');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('normals');
    }
}
