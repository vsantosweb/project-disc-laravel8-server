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
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Guilherme',
                'email' => 'guilherme@propositomaior.com.br',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Mauricio',
                'email' => 'mauricio@empowermind.com.br',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Ronann',
                'email' => 'ronann@empowermind.com.br',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Victor',
                'email' => 'victor@propositomaior.com.br',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Lina',
                'email' => 'lina@propositomaior.com.br',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Thiago',
                'email' => 'thiagoregismkt@gmail.com',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Jessica',
                'email' => 'jessicajesusbastos@gmail.com',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Júlia',
                'email' => 'juliamayumi86@gmail.com',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Marcio Alvim',
                'email' => 'marcio.alvim@soue.com.br',
                'customer_id' => 1,
            ],
            [
                'uuid' => Str::uuid(),
                'name' => 'Flávio Medina',
                'email' => 'flavio.medina@soue.com.br',
                'customer_id' => 1,
            ],
        ]);
    }
}

