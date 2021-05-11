<?php

namespace Database\Seeders;

use App\Models\SubMerchant;
use Illuminate\Database\Seeder;

class SubMerchantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubMerchant::factory()->count(5)->create();
    }
}
