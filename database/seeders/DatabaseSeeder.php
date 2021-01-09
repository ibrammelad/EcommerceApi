<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\Review;
use Faker\Factory;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
            Product::factory(100)->create();
            Review::factory(400)->create();

    }
}
