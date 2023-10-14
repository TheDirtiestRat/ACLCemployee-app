<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Identification>
 */
class IdentificationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employee_id' => fake()->unique()->numerify('0########'),
            'firstname' => fake()->firstName(),
            'middlename' => fake()->firstName(),
            'surname' => fake()->lastName(),

            'birth_date' => fake()->date(),
            'gender' => fake()->randomElement(['Male', 'Female', 'Others']),

            'birth_place' => fake()->address(),
            'bloodtype' => fake()->randomElement(['O+', 'A+', 'B+', 'AB+', 'O-', 'A-', 'B-']),
        ];
    }
}
