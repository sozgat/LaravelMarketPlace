<?php

namespace Database\Factories;

use App\Models\Merchant;
use Illuminate\Database\Eloquent\Factories\Factory;

class MerchantFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Merchant::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'mail' => $this->faker->email,
            'gsm' => $this->faker->phoneNumber,
            'tax_office' => $this->faker->city,
            'tax_number' => $this->faker->randomNumber(NULL,false),
            'legal_company_title' => $this->faker->company,
            'address' => $this->faker->address,
            'website' => $this->faker->domainName,
            'iban' => $this->faker->iban("TR"),
            'type' => Merchant::PRIVATE_COMPANY,
            'is_active' => "1",
        ];
    }
}
