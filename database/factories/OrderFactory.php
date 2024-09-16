<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type_id' => $this->faker->numberBetween(1,3),
            'partnership_id' => $this->faker->numberBetween(1,3),
            'user_id' => $this->faker->numberBetween(1,3),
            'description' => $this->faker->text(),
            'date' => $this->faker->date(),
            'address' => $this->faker->address(),
            'amount' => $this->faker->numberBetween(1,10),
            'status' => 'Создан'
        ];
    }
}
