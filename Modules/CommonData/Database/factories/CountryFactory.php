<?php

namespace Modules\CommonData\Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CommonData\Entities\Country;

class CountryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Country::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'key' => $this->faker->realText($maxNbChars = 200, $indexSize = 2),
            'code' => $this->faker->name,
            'active' => true,
        ];
    }


}
