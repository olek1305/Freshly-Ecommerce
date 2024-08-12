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
 * @property string $client_id
 * @property string $secret_key
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereClientId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereCountryName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereCurrencyRate($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereMode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereSecretKey($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereUpdatedAt($value)
 * @property string $locale_name
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting whereLocaleName($value)
 * @property string $payment_action
 * @method static \Illuminate\Database\Eloquent\Builder|PaypalSetting wherePaymentAction($value)
 * @mixin \Eloquent
 */
class PaypalSetting extends Model
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
