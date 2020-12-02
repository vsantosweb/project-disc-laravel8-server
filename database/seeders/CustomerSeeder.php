<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CustomerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('customers')->insert([

            [
                'name'=> 'Ana Cintra',
                'uuid' => Str::uuid(),
                'email'=> 'ana.cintra@sistemafiep.org.br',
                'password'=> Hash::make('password'),
                'email_verified_at'=> now(),
                'home_dir' => 'customers/'. md5(microtime())
            ],

        ]);
    }
}
