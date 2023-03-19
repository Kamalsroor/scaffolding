<?php

namespace Modules\Product\Database\Factories;

use \Modules\Product\Entities\Product;
use Illuminate\Support\Str;
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
          'name' => [
            'en' => $this->faker->name,
            'de' => $this->faker->name,
          ],
        ];
    }

}
