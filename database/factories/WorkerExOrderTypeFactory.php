<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\WorkerExOrderType>
 */
class WorkerExOrderTypeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'worker_id' => $this->faker->numberBetween(1, 10),
            'order_type_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
