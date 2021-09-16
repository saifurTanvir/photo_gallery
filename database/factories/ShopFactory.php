<?php

namespace Database\Factories;

use App\Models\Shop;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory; 

class ShopFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Shop::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'shop_name' => $this->faker->name(),
            'shop_phone' => $this->faker->e164PhoneNumber(),
            'shop_email' => $this->faker->unique()->safeEmail(),
            'shop_location' => $this->faker->address(),
            'ref_company_id' => function () {
                return \App\Models\Company::factory()->create()->company_id;
            },
            'shop_created_at' => \Carbon\Carbon::now(),
            'shop_updated_at' => null,
            'shop_active' => Arr::random([0, 1])
        ];
    }
}
