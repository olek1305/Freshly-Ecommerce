<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperProductVariantItem
 */
class ProductVariantItem extends Model
{
    use HasFactory;

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
