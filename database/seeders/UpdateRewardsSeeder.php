<?php

namespace Database\Seeders;

use App\Models\Reward;
use Illuminate\Database\Seeder;

class UpdateRewardsSeeder extends Seeder
{
    public function run()
    {
        // Update semua reward dengan tipe redeem
        Reward::where('tipe_reward', 'redeem')
              ->update(['koin_dibutuhkan' => 100]); // Nilai default
        
        // Update semua reward dengan tipe gacha menjadi NULL
        Reward::where('tipe_reward', 'gacha')
              ->update(['koin_dibutuhkan' => null]);
    }
}