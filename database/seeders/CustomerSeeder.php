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
                'name'=> 'John Doe',
                'uuid' => Str::uuid(),
                'email'=> 'souzavito@hotmail.com',
                'password'=> Hash::make('password'),
                'rg'=> '36568989888',
                'cpf'=> '56569987878',
                'birthday'=> '1995-05-20',
                'gender'=> 'masculino',
                'is_reseller'=> 0,
                'phone'=> '1156565987',
                'email_verified_at'=> now(),
                'home_dir' => 'customers/'. md5(microtime())
            ],
            [
                'name'=> 'Mario Bross',
                'uuid' => Str::uuid(),
                'email'=> 'mario@bross.com',
                'password'=> Hash::make('password'),
                'rg'=> '36568989888',
                'cpf'=> '56569987878',
                'birthday'=> '1995-05-20',
                'gender'=> 'masculino',
                'is_reseller'=> 1,
                'phone'=> '1156565987',
                'email_verified_at'=> now(),
                'home_dir' => 'customers/'. md5(microtime())

            ],
        ]);
    }
}
