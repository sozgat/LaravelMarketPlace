<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\SubMerchantPayment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function createPaymentApi(Request $request)
    {

        $subMerchanyPayment = false;

        foreach ($request->basketItems as $basketItem){
            if (array_key_exists('subMerchantKey', $basketItem)){
                $subMerchanyPayment = true;
                break;
            }
        }

        $merchantId = MerchantController::getMerchantIdByApiSecretKey($request->apiKey,$request->secretKey);

        $payment = $this->createPayment($merchantId, $request->paidPrice, $subMerchanyPayment);

        if ($subMerchanyPayment){
            foreach ($request->basketItems as $basketItem){
                $subMerchantId = SubMerchantController::getSubMerchantIdBySubMerchantKey($basketItem['subMerchantKey']);
                $this->createSubMerchantPayment($payment->id, $subMerchantId, $basketItem['subMerchantPrice'] );
            }
            return "Payment and subMerchantPayment are created.";
        }
        return ;
    }

    public function createPayment($paymentMerchantId, $paymentPaidPrice, $subMerchantPayment)
    {
        return $payment = Payment::create([
            'payment_merchant_id' => $paymentMerchantId,
            'payment_paid_price' => $paymentPaidPrice,
            'is_sub_merchant_payment' => $subMerchantPayment,
        ]);

    }

    public function createSubMerchantPayment($paymentId, $paymentSubMerchantId, $subMerchantPrice)
    {
        return $subMerchantPayment = SubMerchantPayment::create([
            'payment_id' => $paymentId,
            'payment_sub_merchant_id' => $paymentSubMerchantId,
            'sub_merchant_price' => $subMerchantPrice
        ]);
    }
}
