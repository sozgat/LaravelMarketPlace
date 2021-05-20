<?php

namespace Database\Factories;

use App\Models\SubMerchantPayment;
use Illuminate\Database\Eloquent\Factories\Factory;

class SubMerchantPaymentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SubMerchantPayment::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'payment_id' => 1,
            'payment_sub_merchant_id' => 10,
            'sub_merchant_price' => 2.0,
        ];
    }
}
