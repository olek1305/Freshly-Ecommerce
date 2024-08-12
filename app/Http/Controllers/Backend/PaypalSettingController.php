<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\PaypalSetting;
use Illuminate\Http\Request;

class PaypalSettingController extends Controller
{
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'status' => ['required', 'integer'],
            'mode' => ['required', 'integer'],
            'country_name' => ['required', 'max:60'],
            'currency_name' => ['required', 'max:10'],
            'currency_rate' => ['required', 'numeric'],
            'locale_name' => ['required', 'max:50'],
            'payment_action' => ['required', 'max:50'],
            'client_id' => ['required', 'string'],
            'secret_key' => ['required', 'string']
        ]);

        // Retrieve the record with id=1
        $paypalSetting = PaypalSetting::find($id);

        if ($paypalSetting) {
            $paypalSetting->update([
                'status' => $request->status,
                'mode' => $request->mode,
                'country_name' => $request->country_name,
                'currency_name' => $request->currency_name,
                'currency_rate' => $request->currency_rate,
                'locale_name' => $request->locale_name,
                'payment_action' => $request->payment_action,
                'client_id' => $request->client_id,
                'secret_key' => $request->secret_key,
            ]);

            flash('Updated Successfully');
        } else {
            flash()->addError('Record not found');
        }

        return redirect()->back();
    }
}
