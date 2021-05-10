<?php

namespace Database\Seeders;

use App\Models\MerchantKey;
use Illuminate\Database\Seeder;

class MerchantKeySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        MerchantKey::factory()->count(5)->create();
    }
}
