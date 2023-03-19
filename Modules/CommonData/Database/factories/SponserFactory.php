<?php

namespace Modules\CommonData\Database\Factories;

use \Modules\CommonData\Entities\Sponser;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class SponserFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Sponser::class;

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

            'is_feature' => $this->faker->numberBetween(0,1),
            'active' => $this->faker->numberBetween(0,1),
            'order_id' => $this->faker->numberBetween(1,10),
        ];
    }

}
