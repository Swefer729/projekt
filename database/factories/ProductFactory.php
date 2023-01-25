<?php

namespace Database\Factories;

use App\Models\Device;
use App\Models\Glass;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'device_id' => Device::select('id')
            ->orderByRaw('RAND()')
            ->first()
            ->id,
            'glass_id' => Glass::select('id')
                ->orderByRaw('RAND()')
                ->first()
                ->id,
            'weight' => $this->faker->numberBetween(20,30),
            'height' => $this->faker->numberBetween(150,180),
            'width' => $this->faker->numberBetween(60,80)
        ];
    }
}
