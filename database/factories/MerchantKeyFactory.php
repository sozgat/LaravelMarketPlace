<?php

namespace Database\Factories;

use App\Models\MerchantKey;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantKeyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = MerchantKey::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'merchant_id' => 1,
            'merchant_api_key' => $this->faker->sha256,
            'merchant_secret_key' => $this->faker->sha256,
        ];
    }
}
