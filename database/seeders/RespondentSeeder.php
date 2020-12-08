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
                'customer_id' => 1,
                'respondent_list_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Guilherme',
                'email' => 'guilherme@teste.com.br',
                'customer_id' => 1,
                'respondent_list_id' => 1,
            ],
        ]);
    }
}

