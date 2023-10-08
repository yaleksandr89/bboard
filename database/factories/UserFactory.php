<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$jpdabtcfHTd40nl/YDdkN.QCi7t5uXR1bY5pQGiCFPSNQ8WjzLJnG', // 111
            'remember_token' => Str::random(10),
        ];
    }
    public function admin(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Александр',
                'email' => 'y.aleksandr89@yandex.ru',
                'email_verified_at' => now(),
                'password' => '$2y$10$jpdabtcfHTd40nl/YDdkN.QCi7t5uXR1bY5pQGiCFPSNQ8WjzLJnG', // 111
                'remember_token' => Str::random(10),
            ];
        });
    }

    public function editor(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'name' => 'Корректор',
                'email' => 'editor@bboard.col',
                'email_verified_at' => now(),
                'password' => '$2y$10$jpdabtcfHTd40nl/YDdkN.QCi7t5uXR1bY5pQGiCFPSNQ8WjzLJnG', // 111
                'remember_token' => Str::random(10),
            ];
        });
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return Factory
     */
    public function unverified(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}
