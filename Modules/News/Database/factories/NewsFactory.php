<?php

namespace Modules\News\Database\Factories;

use \Modules\News\Entities\News;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\News\Entities\Category;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->name,
            'description' => $this->faker->paragraph($nb = 3, $asText = false)  ,
            'mini_description' => $this->faker->paragraph($nb = 3, $asText = false)  ,
            'language' => $this->faker->randomElement(['de', 'en']),
            'date' => $this->faker->date($format = 'Y-m-d', $max = 'now'),
            'order_id' => $this->faker->numberBetween(0,10),
            'active' => $this->faker->numberBetween(0,1),
            'category_id' => Category::inRandomOrder()->limit(1)->get()->first()->id,

        ];
    }

}
