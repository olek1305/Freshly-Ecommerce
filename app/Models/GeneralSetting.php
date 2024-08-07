<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * 
 *
 * @mixin IdeHelperGeneralSetting
 * @property int $id
 * @property string $site_name
 * @property string $layout
 * @property string $contact_email
 * @property string|null $contact_phone
 * @property string|null $contact_address
 * @property string|null $map_url
 * @property string $currency_name
 * @property string $currency_icon
 * @property string $timezone
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting query()
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereContactAddress($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereContactEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereContactPhone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurrencyIcon($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereCurrencyName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereLayout($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereMapUrl($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereSiteName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereTimezone($value)
 * @method static \Illuminate\Database\Eloquent\Builder|GeneralSetting whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class GeneralSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'layout',
        'contact_email',
        'contact_phone',
        'contact_address',
        'map_url',
        'currency_name',
        'timezone',
        'currency_icon'
    ];
}
