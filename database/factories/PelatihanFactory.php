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
            'kode' => $this->faker->word,
            'nama' => $this->faker->word,
            'deskripsi' => $this->faker->sentence,
            'benefit' => $this->faker->sentence,
            'harga' => $this->faker->randomNumber(6),
            'foto' => $this->faker->word,
            'tanggal_mulai' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
            'lokasi' => $this->faker->word,
            'kuota' => $this->faker->randomNumber(2),
            'kuota_tim' => $this->faker->randomNumber(2),
            'status' => $this->faker->randomElement(['Aktif', 'Tidak Aktif']),
        ];
    }
}
