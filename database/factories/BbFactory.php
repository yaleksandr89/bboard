<?php

namespace Database\Factories;

use App\Models\Bb;
use App\Models\User;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;
use Ramsey\Uuid\Exception\BuilderNotFoundException;

class BbFactory extends Factory
{
    protected $model = Bb::class;

    /**
     * @throws Exception
     */
    public function definition(): array
    {
        $user = User::inRandomOrder()->first();

        if (!$user) {
            throw new BuilderNotFoundException('User is empty!');
        }

        $isDeleted = $this->faker->boolean(30);

        return [
            'title' => $this->faker->words(random_int(1, 3), true),
            'content' => $this->faker->text(1000),
            'price' => $this->faker->randomFloat(2, 5, 999999),
            'user_id' => $user,
            'type' => $this->faker->randomElement([1, 2]),
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now', 'Europe/Moscow'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now', 'Europe/Moscow'),
            'deleted_at' => $isDeleted ? $this->faker->dateTimeBetween('-1 month', 'now', 'Europe/Moscow') : null,
        ];
    }
}
