<?php

namespace Modules\CommonData\Database\Factories;

use \Modules\CommonData\Entities\Sponser;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;
use Modules\CommonData\Entities\ContactUs;

class ContactUsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = ContactUs::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
          'name' => $this->faker->name(),
          'phone' => $this->faker->phoneNumber,
          'email' => $this->faker->email,
          'description' => $this->faker->paragraph($nb = 3, $asText = false),
          'show_date' => null,
        ];
    }

}
