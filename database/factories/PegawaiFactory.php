<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pegawai>
 */
class PegawaiFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => 2,
            'nip' => $this->faker->unique()->numerify('##########'),
            'nama' => $this->faker->name(),
            'jabatan_id' => 1,
            'foto' => 'admin.jpg',
        ];
    }
}
