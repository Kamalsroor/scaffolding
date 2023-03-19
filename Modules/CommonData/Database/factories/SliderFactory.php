<?php

namespace Modules\CommonData\Database\Factories;

use \Modules\CommonData\Entities\Slider;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SliderFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Slider::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [

            'title' => [
              'en' => $this->faker->name,
              'de' => $this->faker->name,
            ],
            'sub_title' => [
              'en' => $this->faker->paragraph($nb = 3, $asText = false)  ,
              'de' => $this->faker->paragraph($nb = 3, $asText = false)  ,
            ],
            'button_title' => [
              'en' => $this->faker->name,
              'de' => $this->faker->name,
            ],

            'link' => $this->faker->url,
            'active' => $this->faker->numberBetween(0,1),
            'order_id' => $this->faker->numberBetween(1,10),
        ];
    }

}
