<?php

namespace App\Http\Controllers;

use App\Http\Requests\Recipe\StoreRequest;
use App\Http\Requests\Recipe\UpdateRequest;
use App\Models\Recipe;
use App\Models\Product;
use App\Services\RecipeService;

class RecipeController extends Controller
{
    private $recipeService;
    public function __construct()
    {
        $this->recipeService = app(RecipeService::class);
    }
    public function index()
    {
        $recipes = Recipe::all();
        return view("recipe.index", compact("recipes"));
    }

    public function show(Recipe $recipe)
    {
        return view("recipe.show", compact("recipe"));
    }

    public function create()
    {
        $products = Product::all();
        return view("recipe.create", compact("products"));
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $recipe = $this->recipeService->create($data);
        return view("recipe.show", compact("recipe"));
    }

    public function edit(Recipe $recipe)
    {
        $products = Product::all();
        $recipeProducts = $recipe->products->pluck("id")->toArray();
        return view("recipe.edit", compact("recipe", "products", "recipeProducts"));
    }

    public function update(UpdateRequest $request, Recipe $recipe)
    {
        $data = $request->validated();
        $recipe = $this->recipeService->update($data, $recipe);
        return view("recipe.show", compact("recipe"));
    }

     public function destroy(Recipe $recipe)
    {
        $recipe->delete();
        return redirect()->route('recipe.index');
    }
}
