<?php

namespace Database\Seeders;

use App\Models\Disc\DiscGraph;
use App\Models\Disc\DiscSession;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscSessionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiscSession::factory()->count(20)->create()->each(function($discSession){
            $discGraph = DiscGraph::factory()->count(1)->make();
            $discSession->graph()->saveMany($discGraph);
        });
    }
}
