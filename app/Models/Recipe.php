<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'body'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Recipe::class,'product_recipe');
    }
}
