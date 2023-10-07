<?php

namespace Database\Factories;

use App\Models\Bb;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use Ramsey\Uuid\Exception\BuilderNotFoundException;

class BbFactory extends Factory
{
    protected $model = Bb::class;

    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        if (!$user) {
            throw new BuilderNotFoundException('User is empty!');
        }

        return [
            'title' => $this->faker->word(),
            'content' => $this->faker->word(),
            'price' => $this->faker->randomFloat(2, 5, 9999999),
            'user_id' => $user,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ];
    }
}
