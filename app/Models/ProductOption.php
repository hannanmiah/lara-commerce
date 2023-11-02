<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class ProductOption extends Model
{
    use HasFactory;

    public function product_item(): BelongsToMany
    {
        return $this->belongsToMany(ProductItem::class);
    }
}
