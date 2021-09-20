<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Support\Arr;
use App\Models\Category;
use App\Models\Company;
use App\Models\Shop;
use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Product::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category_ids = Category::pluck('category_id')->toArray();
        $shop_ids = Shop::pluck('shop_id')->toArray();
        $company_ids = Company::pluck('company_id')->toArray();
        return [
            'product_name' => $this->faker->name(),
            'product_detail' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'ref_category_id' => $this->faker->randomElement($category_ids),
            'ref_parent_category_id' => $this->faker->randomElement($category_ids),
            'product_height' =>  $this->faker->randomNumber(),
            'product_width' =>  $this->faker->randomNumber(),
            'product_weight' =>  $this->faker->randomNumber(),
            'product_size' =>  $this->faker->randomNumber(),
            'product_stock' =>  $this->faker->randomNumber(),
            'product_quality' => Arr::random(["Best", "Average", "Good"]),
            'product_warranty' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '30 years', $timezone = null),
            'product_price' =>  $this->faker->randomNumber(),
            'product_creation_date' => \Carbon\Carbon::now(),
            'product_expire_date' => $this->faker->dateTimeBetween($startDate = 'now', $endDate = '30 years', $timezone = null),
            'product_manufacturer_name' => $this->faker->company(),
            'product_manufacture_place' => $this->faker->city(),
            'ref_shop_id' =>  $this->faker->randomElement($shop_ids),
            'ref_company_id' =>  $this->faker->randomElement($company_ids),
            'product_active' => Arr::random([0, 1])
        ];
    }
}
 