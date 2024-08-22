<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 *
 * @method static \Illuminate\Database\Eloquent\Builder|HomePageSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomePageSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|HomePageSetting query()
 * @mixin \Eloquent
 */
class HomePageSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'key', 'value'
    ];
}
