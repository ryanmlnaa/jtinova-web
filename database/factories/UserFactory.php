<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Indicate that the user is an admin.
     *
     * @return Factory
     */

    public function userPelatihan(): Factory
    {
        return $this->assignRole('user-pelatihan');
    }

    /**
     * @param array|\Spatie\Permission\Contracts\Role|string  ...$roles
     * @return UserFactory
    */
    private function assignRole(...$roles): UserFactory
    {
        return $this->afterCreating(function (User $user) use ($roles) {
            $user->assignRole($roles);
        });
    }

    /**
     * Configure the model factory.
     *
     * @return $this
     */
    public function configure(): UserFactory
    {
        return $this->afterMaking(function (User $user) {
            $user->assignRole('user-pelatihan');
        });
    }
    
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
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
        ];
    }
}
