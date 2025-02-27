<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'no_hp' => $this->faker->phoneNumber,
            'alamat' => $this->faker->address,
            'jenis_kelamin' => $this->faker->randomElement(['L', 'P']),
            'pendidikan_terakhir' => $this->faker->randomElement(['S1', 'S2', 'S3']),
            'pekerjaan' => $this->faker->jobTitle,
            'foto' => $this->faker->imageUrl(640, 480, 'people', true),
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ];
    }
}
