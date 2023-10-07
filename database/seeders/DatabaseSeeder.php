<?php

namespace Database\Seeders;

use App\Models\Bb;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(14)->create();
        User::factory()->admin()->create();
        Bb::factory(50)->create();
    }
}
