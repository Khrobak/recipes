<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Recipe extends Model
{
    use HasFactory;
    const DEFAULT_WEIGHT = 100;

    protected $fillable = [
        'title',
        'body'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class)->withPivot('weight');
    }

    public function getProducthWeight($productId): ?int
    {
        $product = $this->products()->where('product_id', $productId)->first();
        return $product ? $product->pivot->weight : self::DEFAULT_WEIGHT;
    }
}
