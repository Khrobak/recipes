<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\ProductController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


    Route::get('/',  [RecipeController::class,'index'])->name('recipe.index');


Route::controller(RecipeController::class)->prefix('recipes')->group( function () {
    Route::get('/',  'index')->name('recipe.index');
    Route::get('/create', 'create')->name('recipe.create');
    Route::post('/', 'store')->name('recipe.store');
    Route::get('/{recipe}', 'show')->name('recipe.show');
    Route::get('/{recipe}/edit', 'edit')->name('recipe.edit');
    Route::patch('/{recipe}', 'update')->name('recipe.update');
    Route::delete('/{recipe}', 'destroy')->name('recipe.delete');
});

Route::controller(ProductController::class)->prefix('products')->group( function () {
    Route::get('/',  'index')->name('product.index');
    Route::get('/create', 'create')->name('product.create');
    Route::post('/', 'store')->name('product.store');
    Route::get('/{product}', 'show')->name('product.show');
    Route::get('/{product}/edit', 'edit')->name('product.edit');
    Route::patch('/{product}', 'update')->name('product.update');
    Route::delete('/{product}', 'destroy')->name('product.delete');
});
