<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\Company;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company_ids = Company::pluck('company_id')->toArray();
        return [
            'category_name' => $this->faker->name(),
            'ref_parent_id' => $this->faker->randomElement($company_ids),
            'ref_company_id' => $this->faker->randomElement($company_ids),
            'category_created_at' => \Carbon\Carbon::now(),
            'category_updated_At' => null,
            'category_active' => Arr::random([0, 1]),

        ];
    }
}
