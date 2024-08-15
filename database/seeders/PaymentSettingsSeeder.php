<?php

namespace Database\Seeders;

use App\Models\PaypalSetting;
use App\Models\StripeSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PaymentSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Paypal
        if (!PaypalSetting::exists()) {
            // Check if no paypalSetting exists, and create a default one if necessary
            PaypalSetting::create([
                'status' => 0,
                'mode' => 0,
                'country_name' => 'United States',
                'currency_name' => 'USD',
                'currency_rate' => 1.0,
                'payment_action' => 'Sale',
                'locale_name' => 'en_US',
                'client_id' => 'your-client-idPayPal',
                'secret_key' => 'your-secret-key'
            ]);
        }

        // Stripe
        if (!StripeSetting::exists()) {
            // Check if no paypalSetting exists, and create a default one if necessary
            StripeSetting::create([
                'status' => 0,
                'mode' => 0,
                'country_name' => 'United States',
                'currency_name' => 'USD',
                'currency_rate' => 1.0,
                'payment_action' => 'Sale',
                'locale_name' => 'en_US',
                'client_id' => 'your-stripe-client-idStripe',
                'secret_key' => 'your-stripe-secret-key'
            ]);
        }
    }
}
