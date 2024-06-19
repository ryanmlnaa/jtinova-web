<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\MbkmUser>
 */
class MbkmUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            'prodi_id' => $this->faker->numberBetween(1, 11),
            'timeline_id' => 1,
            'nim' => 'E411' . $this->faker->randomNumber(5),
            'semester' => $this->faker->numberBetween(1, 8),
            'golongan' => $this->faker->randomElement(['A', 'B', 'C', 'D']),
            'tahun_masuk' => $this->faker->year,
            'no_hp' => '08' . $this->faker->randomNumber(9),
            'photo' => 'photo.jpg',
            'khs' => 'khs.pdf',
            'status' => $this->faker->randomElement(['aktif', 'nonaktif']),
        ];
    }
}
