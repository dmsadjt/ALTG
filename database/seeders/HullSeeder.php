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
            'hull_slug'=>'default',
            'hull_img'=>'no-pictures.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Battleship',
            'hull_slug'=>'battleship',
            'hull_img'=>'battleship.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Aircraft Carrier',
            'hull_slug'=>'aircraft-carrier',
            'hull_img'=>'aircraft_carrier.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Heavy Cruiser',
            'hull_slug'=>'heavy-cruiser',
            'hull_img'=>'heavy_cruiser.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Light Cruiser',
            'hull_slug'=>'light-cruiser',
            'hull_img'=>'light_cruiser.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Destroyer',
            'hull_slug'=>'destroyer',
            'hull_img'=>'destroyer.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Submarine',
            'hull_slug'=>'submarine',
            'hull_img'=>'submarine.png',
        ]);

        DB::table('hulls')->insert([
            'hull_name'=>'Other',
            'hull_slug'=>'other',
            'hull_img'=>'munition_ship.png',
        ]);

        //Subclasses
        DB::table('subclasses')->insert([
            'hull_id'=>'3',
            'sub_name'=>'Aircraft Carrier',
            'sub_tag'=>'CV',
            'sub_slug'=>'aircraft',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'2',
            'sub_name'=>'Aviation Battleship',
            'sub_tag'=>'BBV',
            'sub_slug'=>'aviation',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'2',
            'sub_name'=>'Battlecruiser',
            'sub_tag'=>'BC',
            'sub_slug'=>'cruiser',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'2',
            'sub_name'=>'Battleship',
            'sub_tag'=>'BB',
            'sub_slug'=>'battleship',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'6',
            'sub_name'=>'Destroyer',
            'sub_tag'=>'DD',
            'sub_slug'=>'destroyer',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'6',
            'sub_name'=>'Guided-missile destroyer',
            'sub_tag'=>'DDG',
            'sub_slug'=>'guided',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'4',
            'sub_name'=>'Heavy Cruiser',
            'sub_tag'=>'CA',
            'sub_slug'=>'heavycruiser',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'4',
            'sub_name'=>'Large Cruiser',
            'sub_tag'=>'CB',
            'sub_slug'=>'largecruiser',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'3',
            'sub_name'=>'Light Aircraft Carrier',
            'sub_tag'=>'CVL',
            'sub_slug'=>'lightaircraft',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'5',
            'sub_name'=>'Light Cruiser',
            'sub_tag'=>'CL',
            'sub_slug'=>'lightcruiser',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'2',
            'sub_name'=>'Battle Monitor',
            'sub_tag'=>'BM',
            'sub_slug'=>'battle-monitor',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'8',
            'sub_name'=>'Munition ship',
            'sub_tag'=>'AE',
            'sub_slug'=>'munition',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'8',
            'sub_name'=>'Repair ship',
            'sub_tag'=>'AR',
            'sub_slug'=>'repair',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'7',
            'sub_name'=>'Aviation Submarine',
            'sub_tag'=>'SSV',
            'sub_slug'=>'aviation-submarine',
        ]);

        DB::table('subclasses')->insert([
            'hull_id'=>'7',
            'sub_name'=>'Submarine',
            'sub_tag'=>'SS',
            'sub_slug'=>'submarine',
        ]);
    }
}
