<?php

namespace Database\Seeders;

use App\Models\GeneralSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GeneralSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        GeneralSetting::updateOrCreate(
            ['id' => 1],
            [
                'site_name' => 'ExampleSiteName',
                'layout' => 'RTL',
                'contact_email' => 'Example@gmail.com',
                'contact_phone' => '111222111',
                'contact_address' => 'Berlin, Address 23a',
                'map_url' => 'ExampleMapUrl.com',
                'currency_name' => 'EUR',
                'currency_icon' => '€',
                'timezone' => 'Europe/Berlin'
            ]
        );
    }
}
