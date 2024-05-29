<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pelatihan>
 */
class PelatihanFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'id_kategori' => 1,
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'benefit' => $this->faker->sentence,
            'harga' => $this->faker->randomNumber(6),
            'foto' => $this->faker->word,
        ];
    }
}
