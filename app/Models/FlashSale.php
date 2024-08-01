<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @mixin IdeHelperFlashSale
 */
class FlashSale extends Model
{
    use HasFactory;

    protected $fillable = ['end_date'];
}
