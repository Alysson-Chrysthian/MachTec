<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('plans')
            ->insert([
                'name' => 'monthly',
                'stripe_price_id' => 'price_1ROSNWGMntdVxC2dKKX5arb3',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        DB::table('plans')
            ->insert([
                'name' => 'yearly',
                'stripe_price_id' => 'price_1ROSWFGMntdVxC2dZUEfGcqx',
                'created_at' => now(),
                'updated_at' => now(),
            ]);
    }
}
