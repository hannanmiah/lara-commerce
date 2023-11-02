<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Staudenmeir\LaravelAdjacencyList\Eloquent\HasRecursiveRelationships;
use Staudenmeir\LaravelAdjacencyList\Eloquent\Relations\HasManyOfDescendants;

class Category extends Model
{
    use HasFactory, HasRecursiveRelationships;

    protected $fillable = [
        'name',
        'slug',
        'parent_id',
    ];

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }

    public function recursiveProducts(): HasManyOfDescendants
    {
        return $this->hasManyOfDescendantsAndSelf(Product::class);
    }
}
