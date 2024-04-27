<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentMethodController extends Controller
{
    public function index()
    {
        $paymentMethods = \App\PaymentMethod::select('type', 'code', 'status')
            ->groupBy('type', 'code')
            ->get();


        return view('organizer.paymentMethod.show')->with('paymentMethods', $paymentMethods);
    }

    public function update(Request $request)
    {
        $paymentMethods = $request->input('payment_methods');
        foreach ($paymentMethods as $paymentMethodData) {
            $code = $paymentMethodData['code'];
            $status = isset($paymentMethodData['status']) ? ($paymentMethodData['status'] === 'on') : false;

            $paymentMethod = \App\PaymentMethod::where('code', $code)->first();
            $paymentMethod->status = $status;
            $paymentMethod->save();
        }

        $paymentMethodsData = \App\PaymentMethod::select('type', 'code', 'status')
            ->groupBy('type', 'code')
            ->get();

        return redirect()->back()->with('paymentMethods', $paymentMethodsData);
    }
}
