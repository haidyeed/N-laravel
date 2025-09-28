<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Apartment>
 */
class ApartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'unit_name' => $this->faker->words(2, true), // e.g., "Skyview Loft"
            'unit_number' => strtoupper($this->faker->bothify('??-###')), // e.g., "AB-123"
            'project' => $this->faker->company, // e.g., "Palm Hills"
            'description' => $this->faker->paragraph,
            'price' => $this->faker->randomFloat(2, 500000, 1500000), // between 500k–1.5M
            'bedrooms' => $this->faker->numberBetween(1, 5),
            'bathrooms' => $this->faker->numberBetween(1, 3),
            'area' => $this->faker->randomFloat(2, 60, 250), // in square meters
            'floor' => $this->faker->numberBetween(1, 20),
            'is_available' => $this->faker->boolean(80), // 80% chance available
            'order' => $this->faker->numberBetween(0, 100)

        ];
    }
}
