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
                'document_1'=> '',
                'document_2'=> '',
                'company_name'=> 'Serviço Nacional de Aprendizagem Industrial (SENAI)',
                'phone'=> '',
                'email_verified_at'=> now(),
                'home_dir' => 'customers/'. md5(microtime())
            ],
            [
                'name'=> 'John Doe',
                'uuid' => Str::uuid(),
                'email'=> 'souzavito@hotmail.com',
                'password'=> Hash::make('password'),
                'document_1'=> '36568989888',
                'document_2'=> '56569987878',
                'phone'=> '1156565987',
                'email_verified_at'=> now(),
                'home_dir' => 'customers/'. md5(microtime())

            ],
        ]);
    }
}
