<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscRangeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disc_ranges')->insert([
            //D
            ['disc_id' => 1, 'range' => '[25, 12, 10, 9]', 'segment_id' => 7],
            ['disc_id' => 1, 'range' => '[8, 6, 5]', 'segment_id' => 6],
            ['disc_id' => 1, 'range' => '[4, 3, 2]', 'segment_id' => 5],
            ['disc_id' => 1, 'range' => '[1, 0]', 'segment_id' => 4],
            ['disc_id' => 1, 'range' => '[-1, -2, -3]', 'segment_id' => 3],
            ['disc_id' => 1, 'range' => '[-4, -5, -6]', 'segment_id' => 2],
            ['disc_id' => 1, 'range' => '[-7, -9, -10, -25]', 'segment_id' => 1],

            //I
            ['disc_id' => 2, 'range' => '[26,13,10,9]', 'segment_id' => 7],
            ['disc_id' => 2, 'range' => '[8,7,6,5]', 'segment_id' => 6],
            ['disc_id' => 2, 'range' => '[4,3]', 'segment_id' => 5],
            ['disc_id' => 2, 'range' => '[2,1,0]', 'segment_id' => 4],
            ['disc_id' => 2, 'range' => '[-1, -2]', 'segment_id' => 3],
            ['disc_id' => 2, 'range' => '[-3, -4]', 'segment_id' => 2],
            ['disc_id' => 2, 'range' => '[-5, -6, -8, -26]', 'segment_id' => 1],

            //S
            ['disc_id' => 3, 'range' => '[26,11,10,8]', 'segment_id' => 7],
            ['disc_id' => 3, 'range' => '[7,6]', 'segment_id' => 6],
            ['disc_id' => 3, 'range' => '[5,4,3]', 'segment_id' => 5],
            ['disc_id' => 3, 'range' => '[2]', 'segment_id' => 4],
            ['disc_id' => 3, 'range' => '[1,0]', 'segment_id' => 3],
            ['disc_id' => 3, 'range' => '[-1,-2,-3]', 'segment_id' => 2],
            ['disc_id' => 3, 'range' => '[-4, -6, -26]', 'segment_id' => 1],

            //c
            ['disc_id' => 4, 'range' => '[25,8,6,4]', 'segment_id' => 7],
            ['disc_id' => 4, 'range' => '[3,2,1]', 'segment_id' => 6],
            ['disc_id' => 4, 'range' => '[0,-1,-2]', 'segment_id' => 5],
            ['disc_id' => 4, 'range' => '[-3,-4]', 'segment_id' => 4],
            ['disc_id' => 4, 'range' => '[-5,-6]', 'segment_id' => 3],
            ['disc_id' => 4, 'range' => '[-7,-8,-9]', 'segment_id' => 2],
            ['disc_id' => 4, 'range' => '[-10,-11,-12,-25]', 'segment_id' => 1],
        ]);
    }
}
