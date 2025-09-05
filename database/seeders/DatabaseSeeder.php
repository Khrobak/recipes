<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Recipe;
use App\Models\Product;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $products = Product::factory(10)->create();

        Recipe::factory()
            ->count(10)
            ->withProductsWithPivot($products->random(2))
            ->create();
    }
}
