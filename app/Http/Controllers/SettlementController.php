<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Settlement;
use App\Models\SubMerchantPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SettlementController extends Controller
{
    public function createSettlement()
    {
        $payments = Payment::where('payment_is_settlement',0)->get();

        foreach ($payments as $payment){
            if ($payment['payment_is_settlement'] == 0){
                if ($payment['is_sub_merchant_payment'] == 1){

                    $paidPriceOfSubMerchants = 0;
                    $subMerchantPayments = SubMerchantPayment::where('payment_id',$payment['id'])->get();

                    foreach ($subMerchantPayments as $subMerchantPayment){
                        $paidPriceOfSubMerchants += $subMerchantPayment['sub_merchant_price'];

                        Settlement::create([
                            'settlement_merchant_id' => $subMerchantPayment['payment_sub_merchant_id'],
                            'settlement_payment_id' => $payment['id'],
                            'settlement_total_price' => $subMerchantPayment['sub_merchant_price'],
                        ]);

                        SubMerchantPayment::where('id', $subMerchantPayment['id'])->update(['sub_merchant_payment_is_settlement' => 1]);

                    }

                    Settlement::create([
                        'settlement_merchant_id' => $payment['payment_merchant_id'],
                        'settlement_payment_id' => $payment['id'],
                        'settlement_total_price' => $payment['payment_paid_price'] - $paidPriceOfSubMerchants,
                    ]);

                    Payment::where('id', $payment['id'])->update(['payment_is_settlement' => 1]);

                }
                else{
                    Settlement::create([
                        'settlement_merchant_id' => $payment['payment_merchant_id'],
                        'settlement_payment_id' => $payment['id'],
                        'settlement_total_price' => $payment['payment_paid_price'],
                    ]);

                    Payment::where('id', $payment['id'])->update(['payment_is_settlement' => 1]);
                }
            }
        }
        return "Settlement is done.";
    }
}
