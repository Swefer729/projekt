<?php

namespace Database\Factories;

use App\Models\PhoneModel;
use App\Models\Producer;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Device>
 */
class DeviceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'producer_id' => Producer::select('id')
                ->orderByRaw('RAND()')
                ->first()
                ->id,
            'phonemodel_id' => PhoneModel::select('id')
                ->orderByRaw('RAND()')
                ->first()
                ->id,
            'created_at' => $this->faker->dateTimeBetween(
                '- 8 weeks',
                '- 4 weeks',
            ),
            'updated_at' => $this->faker->dateTimeBetween(
                '- 4 weeks',
                ' - 1 week',
            ),

        ];
    }
}
