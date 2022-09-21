<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');
            $table->string('subtitle_1')->nullable();
            $table->string('subtitle_2')->nullable();
            $table->string('subtitle_3')->nullable();
            $table->string('subtitle_4')->nullable();
            $table->string('subtitle_5')->nullable();
            $table->longText('body');
            $table->longText('body_2')->nullable();
            $table->longText('body_3')->nullable();
            $table->longText('body_4')->nullable();
            $table->longText('body_5')->nullable();
            $table->string('table')->nullable();
            $table->string('table_caption')->nullable();
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
        Schema::dropIfExists('posts');
    }
}
