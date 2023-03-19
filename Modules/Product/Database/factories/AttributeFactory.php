<?php

namespace Modules\Product\Database\Factories;

use \Modules\Product\Entities\Attribute;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class AttributeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Attribute::class;

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
          'parent_id' => $this->faker->numberBetween(0,100),
          'have_child' => $this->faker->numberBetween(0,1),
          'active' => $this->faker->numberBetween(0,1),
          'order_id' => $this->faker->numberBetween(1,10),
        ];
    }

}
