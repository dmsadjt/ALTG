<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Hull;
use Illuminate\Support\Facades\DB;

class HullSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hulls')->insert([
            'hull_name'=>'Default',
            'hull_tag'=>'De',
            'hull_slug'=>'default',
            'hull_img'=>'no-pictures.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Aircraft Carrier',
            'hull_tag'=>'CV',
            'hull_slug'=>'aircraft',
            'hull_img'=>'aircraft_carrier.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Aviation Battleship',
            'hull_tag'=>'BBV',
            'hull_slug'=>'aviation',
            'hull_img'=>'aviation_battleship.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Battlecruiser',
            'hull_tag'=>'BC',
            'hull_slug'=>'cruiser',
            'hull_img'=>'battlecruiser.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Battleship',
            'hull_tag'=>'BB',
            'hull_slug'=>'battleship',
            'hull_img'=>'battleship.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Destroyer',
            'hull_tag'=>'DD',
            'hull_slug'=>'destroyer',
            'hull_img'=>'destroyer.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Guided-missile destroyer',
            'hull_tag'=>'DDG',
            'hull_slug'=>'guided',
            'hull_img'=>'ddg.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Heavy Cruiser',
            'hull_tag'=>'CA',
            'hull_slug'=>'heavycruiser',
            'hull_img'=>'heavy_cruiser.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Large Cruiser',
            'hull_tag'=>'LC',
            'hull_slug'=>'largecruiser',
            'hull_img'=>'large_cruiser.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Light Aircraft Carrier',
            'hull_tag'=>'CVL',
            'hull_slug'=>'lightaircraft',
            'hull_img'=>'light_aircraft_carrier.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Light Cruiser',
            'hull_tag'=>'CL',
            'hull_slug'=>'lightcruiser',
            'hull_img'=>'light_cruiser.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Monitor',
            'hull_tag'=>'MM',
            'hull_slug'=>'monitor',
            'hull_img'=>'monitor.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Munition ship',
            'hull_tag'=>'MS',
            'hull_slug'=>'munition',
            'hull_img'=>'munition_ship.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Repair ship',
            'hull_tag'=>'RS',
            'hull_slug'=>'repair',
            'hull_img'=>'repair_ship.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Submarine Carrier',
            'hull_tag'=>'CS',
            'hull_slug'=>'submarinecarrier',
            'hull_img'=>'submarine_carrier.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Submarine',
            'hull_tag'=>'SS',
            'hull_slug'=>'submarine',
            'hull_img'=>'submarine.png',
        ]);
    }
}
