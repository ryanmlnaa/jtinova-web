<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class InstrukturUserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'no_hp' => '08' . $this->faker->randomNumber(9),
            'alamat' => $this->faker->address,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'pendidikan_terakhir' => $this->faker->randomElement(['S1', 'S2', 'S3']),
            'pekerjaan' => $this->faker->jobTitle,
            'foto' => $this->faker->imageUrl(),
            'portofolio' => $this->faker->imageUrl(),
            'cv' => $this->faker->imageUrl(),
            'linkedin' => $this->faker->url,
            'status' => $this->faker->randomElement(["Aktif", "Tidak Aktif"]),
        ];
    }
}
