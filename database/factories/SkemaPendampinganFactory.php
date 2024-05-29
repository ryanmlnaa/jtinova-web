<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkemaPendampingan>
 */
class SkemaPendampinganFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name(),
            'deskripsi' => $this->faker->sentence(),
            'harga' => $this->faker->randomNumber(5),
            'foto' => $this->faker->word(),
            'status' => $this->faker->word(),
        ];
    }
}
