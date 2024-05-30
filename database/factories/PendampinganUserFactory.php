<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PendampinganUser>
 */
class PendampinganUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'prodi_id' => $this->faker->numberBetween(1, 11),
            'nim' => 'E411' . $this->faker->randomNumber(5),
            'judul' => $this->faker->sentence,
            'dosen_pembimbing' => $this->faker->name,
            'no_hp' => '08' . $this->faker->randomNumber(9),
            'kendala' => $this->faker->sentence,
            'skema_pendampingan_id' => $this->faker->numberBetween(1, 3),
        ];
    }
}
