<?php

namespace Database\Factories;

use App\Models\TagBb;
use Exception;
use Illuminate\Database\Eloquent\Factories\Factory;

class TagBbFactory extends Factory
{
    protected $model = TagBb::class;


    /**
     * @throws Exception
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->word(),
            'description' => $this->generationRandomText(100, 450),
            'created_at' => $this->faker->dateTimeBetween('-3 month', '-2 week', 'Europe/Moscow'),
            'updated_at' => $this->faker->dateTimeBetween('-4 week', 'now', 'Europe/Moscow'),
        ];
    }

    private function generationRandomText(int $to = 50, int $from = 500): string
    {
        $length = $this->faker->numberBetween($to, $from);

        return $this->faker->text($length);
    }
}
