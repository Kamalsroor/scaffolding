<?php

namespace Modules\News\Database\Factories;

use \Modules\News\Entities\Category;
use Illuminate\Support\Str;
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
        return [
            'name' => [
              'en' => $this->faker->name,
              'de' => $this->faker->name,
            ],

            'active' => $this->faker->numberBetween(0,1),
        ];
    }

}
