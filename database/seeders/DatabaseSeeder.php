<?php

namespace Database\Seeders;

use App\Models\Bb;
use App\Models\User;
use App\Models\CategoryBb;
use App\Models\TagBb;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(8)->create();
        User::factory()->admin()->create();
        User::factory()->editor()->create();
        CategoryBb::factory(20)->create();
        TagBb::factory(50)->create();
        Bb::factory(100)->create();
    }
}
