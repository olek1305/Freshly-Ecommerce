<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function index()
    {
        $paypalSetting = PaypalSetting::first(); // Fetch the first record

        if (!$paypalSetting) {
            // Create the default record if none exists
            $paypalSetting = new PaypalSetting([
                'status' => 0,
                'mode' => '0',
                'country_name' => 'United States',
                'currency_name' => 'USD',
                'currency_rate' => 1.0,
                'payment_action' => 'Sale',
                'locale_name' => 'en_US',
                'client_id' => 'your-client-id',
                'secret_key' => 'your-secret-key'
            ]);

            $paypalSetting->save();
        }

        return view('admin.payment-settings.index', compact('paypalSetting'));
    }
}
