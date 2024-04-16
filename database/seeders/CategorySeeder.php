<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $seedCount = (int) $this->command->ask('How many fake data do you want me to seed?', 10);

        $categories = Category::factory($seedCount)->create();
    }
}
