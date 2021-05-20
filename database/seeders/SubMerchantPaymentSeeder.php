<?php

namespace Database\Seeders;

use App\Models\SubMerchantPayment;
use Illuminate\Database\Seeder;

class SubMerchantPaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SubMerchantPayment::factory()->count(3)->create();
    }
}
