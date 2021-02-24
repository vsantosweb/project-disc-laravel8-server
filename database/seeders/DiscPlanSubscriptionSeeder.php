<?php

namespace Database\Seeders;

use App\Models\Disc\DiscPlan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DiscPlanSubscriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('disc_plan_subscriptions')->insert([
            'code' => strtoupper(uniqid()),
            'customer_id' => 1,
            'name' => 'Free',
            'slug' => 'free',
            'status' => 1,
            'amount' => 0,
            'validity_days' => 30,
            'expire_at' => now()->addDays(30),
            'features' => json_encode(DiscPlan::find(1)->features),
            'description' => DiscPlan::find(1)->description,
        ]);
    }
}
