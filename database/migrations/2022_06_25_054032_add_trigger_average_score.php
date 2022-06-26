<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class AddTriggerAverageScore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // DB::unprepared('CREATE OR REPLACE TRIGGER add_average_mob_score
        //     BEFORE INSERT
        //         ON mob_scores
        //         FOR EACH ROW
        //     INSERT INTO mob_scores (average) values (1);
        // ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        // DB::unprepared('DROP TRIGGER add_average_mob_score');
    }
}
