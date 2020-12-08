<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DiscSeeder::class,
            DiscSeeder::class,
            DiscSessionSeeder::class,
            DiscGraphTypeSeeder::class,
            DiscGraphConfigSeeder::class,
            CustomerSeeder::class,
            DiscSegmentSeeder::class,
            DiscRangeSeeder::class,
            RespondentListSeeder::class,
            RespondentSeeder::class,

            // DiscProfileSeeder::class,
            // DiscCategorySeeder::class

        ]);
    }
}
