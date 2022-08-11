<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubclassesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subclasses', function (Blueprint $table) {
            $table->id();
            $table->timestamps();

            $table->bigInteger('hull_id');
            $table->string('sub_name');
            $table->string('sub_tag');
            $table->string('sub_slug');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subclasses');
    }
}
