<?php

namespace Modules\CommonData\Database\Factories;

use \Modules\CommonData\Entities\Service;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class ServiceFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Service::class;

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
            'description' => [
              'en' => $this->faker->paragraph($nb = 3, $asText = false)  ,
              'de' => $this->faker->paragraph($nb = 3, $asText = false)  ,
            ],
            'active' => $this->faker->numberBetween(0,1),
            'order_id' => $this->faker->numberBetween(1,10),
        ];
    }

}
