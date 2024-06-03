<?php

namespace App\Http\Controllers\Gateways;

use App\Http\Controllers\Controller;
use Mollie\Laravel\Facades\Mollie;
use Illuminate\Http\Request;

class MollieController extends Controller
{

    public function payment(Request $request)
    {
        $payment = Mollie::api()->payments->create([
            "amount" => [
                "currency" => "USD",
                "value" => number_format($request->price, 2, '.', '') // You must send the correct number of decimals, thus we enforce the use of strings
            ],
            "description" => "Order #12345",
            "redirectUrl" => route('mollie.success'),
//            "webhookUrl" => route('webhooks.mollie'),
            "metadata" => [
                "order_id" => "12345",
            ],
        ]);

        session(['mollie_id' => $payment->id]);

        // redirect customer to Mollie checkout page
        return redirect($payment->getCheckoutUrl(), 303);
    }

    public function success(Request $request)
    {
        $paymentId = $request->input('id');
        $payment = Mollie::api()->payments->get($paymentId);

        if ($payment->isPaid()) {
            return 'payment success';
        } else {
            return 'payment failed';
        }
    }
}
