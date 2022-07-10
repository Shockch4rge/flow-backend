<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends Factory
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "name" => $this->faker->name(),
            "username" => $this->faker->userName(),
            "email" => $this->faker->unique()->safeEmail(),
            "password" => Hash::make($this->faker->password(10)),
        ];
    }
}
