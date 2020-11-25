<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscSegmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disc')->insert([
            ['name' => 'Segmento 1', 'number' => 1, 'min_range' => -25, 'max_range' => -10],
            ['name' => 'Segmento 2', 'number' => 2, 'min_range' =>, 'max_range'],
            ['name' => 'Segmento 3', 'number' => 3, 'min_range' =>, 'max_range'],
            ['name' => 'Segmento 4', 'number' => 4, 'min_range' =>, 'max_range'],
            ['name' => 'Segmento 5', 'number' => 5, 'min_range' =>, 'max_range'],
            ['name' => 'Segmento 6', 'number' => 6, 'min_range' =>, 'max_range'],
            ['name' => 'Segmento 7', 'number' => 7, 'min_range' =>, 'max_range'],
        ]);

        // $o = [
        // 'segmento 1' =>
        //     'range' => [
        //         'min'=> -25,
        //         'max' => -10,
        //         ];
        //         'intensity' =>  [
        //             'min' => 1,
        //             'max' => 4
        //         ]
        //     ],

    }
}


