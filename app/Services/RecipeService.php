<?php
namespace App\Services;
use Illuminate\Support\Facades\Storage;
use App\Models\Recipe;
use App\Models\Product;

class RecipeService {

    private $recipeModel;

    public function __construct()
    {
        $this->recipeModel = app(Recipe::class);
    }
public function create($data)
{
    $productIds = $data["products"];
    $products = [];
    
    //TO DO: update the form so that you can set the weight
    foreach ($productIds as $productId) {
        $products[$productId] = [
            "weight" => $this->recipeModel::DEFAULT_WEIGHT,
        ];
    }
    unset($data["products"]);
  
    $recipe = Recipe::create($data);
    $recipe->products()->sync($products);
    return $recipe;
}

public function update($data, Recipe $recipe)
{
    $productIds = $data["products"];

    //TO DO: update the form so that you can set the weight
    foreach ($productIds as $productId) {
        $products[$productId] = [
            "weight" => $this->recipeModel->getProducthWeight($productId),
        ];
    }
    unset($data["products"]);
    $recipe->update($data);
    $recipe->products()->sync($products);
    return $recipe;
}

}
