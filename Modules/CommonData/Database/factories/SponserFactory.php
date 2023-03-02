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
            'name' => $this->faker->name,
        ];
    }

}
