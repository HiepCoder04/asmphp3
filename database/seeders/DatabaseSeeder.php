<?php

namespace Database\Seeders;

use App\Models\Category;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Product;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class
            // ProductSeeder::class
            // CategorySeeder::class
        ]);
    }
}
