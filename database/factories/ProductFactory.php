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
        return [
            'product_name' => $this->faker->name(),
            'product_detail' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'ref_category_id' => null,
            'ref_parent_category_id' => '',
            'product_height' => '',
            'product_width' => '',
            'product_weight' => '',
            'product_size' => '',
            'product_stock' => null,
            'product_quality' => '',
            'product_warranty' => '',
            'product_price' => '',
            'product_creation_date' => '',
            'product_expire_date' => \Carbon\Carbon::now(),
            'product_manufacturer_name' => '',
            'product_manufacture_place' => '',
            'ref_shop_id' => null,
            'ref_company_id' => null,
            'product_active' => Arr::random([0, 1])
        ];
    }
}
 