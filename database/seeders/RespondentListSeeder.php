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
    }
}
