<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RespondentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('respondents')->insert([
            [
                'uuid' => Str::uuid(),
                'name' => 'Vitor Santos',
                'email' => 'souzavito@hotmail.com',
            ],[
                'uuid' => Str::uuid(),
                'name' => 'Mario Bross',
                'email' => 'viktorlssantos@gmail.com',
            ]
        ]);
    }
}
