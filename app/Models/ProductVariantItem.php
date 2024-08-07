<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @mixin IdeHelperProductVariantItem
 * @property int $id
 * @property int $product_variant_id
 * @property string $name
 * @property float $price
 * @property int $is_default
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\ProductVariant|null $productVariant
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereIsDefault($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem wherePrice($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereProductVariantId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductVariantItem whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class ProductVariantItem extends Model
{
    use HasFactory;

    public function productVariant()
    {
        return $this->belongsTo(ProductVariant::class);
    }
}
