<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreRequest;
use App\Http\Requests\Product\UpdateRequest;
use App\Services\RecipeService;
use App\Models\Recipe;
use App\Models\Product;

class ProductController extends Controller
{
        private $recipeService;
    public function __construct()
    {
        $this->recipeService = app(RecipeService::class);
    }
    public function index()
    {
        $products = Product::all();
        return view("product.index", compact("products"));
    }

    public function show(Product $product)
    {
        return view("product.show", compact("product"));
    }

    public function create()
    {
        return view("product.create");
    }

    public function store(StoreRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);
        return view("product.show", compact("product"));
    }

    public function edit(Product $product)
    {
        return view("product.edit", compact("product"));
    }

    public function update(UpdateRequest $request, Product $product)
    {
        $data = $request->validated();
        $product->update($data);
        return view("product.show", compact("product"));
    }

     public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('product.index');
    }
}
