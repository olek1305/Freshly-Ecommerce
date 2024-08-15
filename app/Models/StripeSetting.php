<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @property int $id
 * @property int $status
 * @property int $mode
 * @property string $country_name
 * @property string $currency_name
 * @property float $currency_rate
 * @property string $locale_name
 * @property string $payment_action
 * @property string $client_id
 * @property string $secret_key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereCurrencyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereLocaleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting wherePaymentAction($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereSecretKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|StripeSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class StripeSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'mode',
        'country_name',
        'currency_name',
        'currency_rate',
        'locale_name',
        'payment_action',
        'client_id',
        'secret_key',
    ];
}
