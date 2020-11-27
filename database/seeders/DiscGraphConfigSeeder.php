<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscGraphConfigSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        DB::table('disc_graph_config')->insert([

            ['name' => 'Segmento 1', 'disc_graph_type_id' => 1, 'number' => 1, 'min_range' => -25, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 2', 'disc_graph_type_id' => 1, 'number' => 2, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 3', 'disc_graph_type_id' => 1, 'number' => 3, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 4', 'disc_graph_type_id' => 1, 'number' => 4, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 5', 'disc_graph_type_id' => 1, 'number' => 5, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 6', 'disc_graph_type_id' => 1, 'number' => 6, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 7', 'disc_graph_type_id' => 1, 'number' => 7, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],

            ['name' => 'Segmento 1', 'disc_graph_type_id' => 2, 'number' => 1, 'min_range' => -25, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 2', 'disc_graph_type_id' => 2, 'number' => 2, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 3', 'disc_graph_type_id' => 2, 'number' => 3, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 4', 'disc_graph_type_id' => 2, 'number' => 4, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 5', 'disc_graph_type_id' => 2, 'number' => 5, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 6', 'disc_graph_type_id' => 2, 'number' => 6, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 7', 'disc_graph_type_id' => 2, 'number' => 7, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],

            ['name' => 'Segmento 1', 'disc_graph_type_id' => 3, 'number' => 1, 'min_range' => -25, 'max_range' => -10, 'min_intensity' => 1, 'max_intensity' => 4],
            ['name' => 'Segmento 2', 'disc_graph_type_id' => 3, 'number' => 2, 'min_range' => -9, 'max_range' => -7, 'min_intensity' => 5, 'max_intensity' => 8],
            ['name' => 'Segmento 3', 'disc_graph_type_id' => 3, 'number' => 3, 'min_range' => -6, 'max_range' => -5, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 4', 'disc_graph_type_id' => 3, 'number' => 4, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 5', 'disc_graph_type_id' => 3, 'number' => 5, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 6', 'disc_graph_type_id' => 3, 'number' => 6, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],
            ['name' => 'Segmento 7', 'disc_graph_type_id' => 3, 'number' => 7, 'min_range' => 1, 'max_range' => -10, 'min_intensity' => 2, 'max_intensity' => 3],

        ]);
    }
}
