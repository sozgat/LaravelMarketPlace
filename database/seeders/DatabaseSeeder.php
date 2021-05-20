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
        // \App\Models\User::factory(10)->create();
       $this->call(MerchantSeeder::class);
       $this->call(MerchantKeySeeder::class);
       $this->call(SubMerchantSeeder::class);
       $this->call(PaymentSeeder::class);
       $this->call(SubMerchantSeeder::class);
       $this->command->info("Database seeded.");
    }
}
