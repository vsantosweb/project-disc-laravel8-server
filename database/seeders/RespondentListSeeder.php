<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RespondentListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('respondent_lists')->insert([
            'uuid' => Str::uuid(),
            'customer_id' => 1,
            'name' => 'Lista 1',
        ]);

        DB::table('respondents_to_lists')->insert([
            [
                'respondent_id' => 1,
                'list_id' => 1,
            ],
            [
                'respondent_id' => 2,
                'list_id' => 1,
            ]
        ]);
    }
}
