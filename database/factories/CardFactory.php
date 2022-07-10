<?php

namespace Database\Factories;

use App\Models\Folder;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "folder_id" => Folder::all()->random()->id,
            "name" => $this->faker->word(),
            "description" => $this->faker->sentence(),
        ];
    }
}
