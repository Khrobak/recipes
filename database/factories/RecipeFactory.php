<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Recipe;
use App\Models\Product;

class RecipeFactory extends Factory
{
    const DEFAULT_WEIGHT = 100;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title(),
            'body'  => $this->faker->realText(100),
        ];
    }

     public function withProductsWithPivot($products): static
    {
        return $this->afterCreating(function (Recipe $recipe) use ($products) { 
            $pivotData = [];
            foreach ($products as $product) {
                $pivotData[$product->id] = [
                    'weight'     => self::DEFAULT_WEIGHT,
                    'product_id' => $product->id
                ];
            }

            $recipe->products()->attach($pivotData);
        });
    }
}
