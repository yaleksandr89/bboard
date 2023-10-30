<?php

namespace Database\Factories;

use App\Models\CategoryBb;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryBbFactory extends Factory
{
    protected $model = CategoryBb::class;

    /**
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->words(random_int(1, 3), true),
            'description' => $this->faker->text(500),
            'created_at' => $this->faker->dateTimeBetween('-2 month', 'now', 'Europe/Moscow'),
            'updated_at' => $this->faker->dateTimeBetween('-3 week', 'now', 'Europe/Moscow'),
        ];
    }
}
