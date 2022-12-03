<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class GlassFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_name' => $this->faker->unique()->word(100),
            'model_name' => $this->faker->unique()->word(100),
            'width' => $this->faker->numberBetween(40,90),
            'height' => $this->faker->numberBetween(130,190),
            'weight' => $this->faker->numberBetween(120,210),
            'created_at' => $this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks',
            ),
            'updated_at' => $this->faker->dateTimeBetween(
                '- 4 weeks',
                ' - 1 week',
            ),
            'deleted_at' => rand(0, 10) === 0
                ? $this->faker->dateTimeBetween(
                    '- 1 week',
                    '+ 2 weeks',
                )
                : null
        ];
    }
}
