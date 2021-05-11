<?php

namespace Database\Factories;

use App\Models\SubMerchant;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubMerchantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubMerchant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'top_merchant_id' => 1,
            'sub_merchant_key' => $this->faker->sha256,
            'sub_merchant_external_id' => $this->faker->randomNumber(6),
        ];
    }
}
