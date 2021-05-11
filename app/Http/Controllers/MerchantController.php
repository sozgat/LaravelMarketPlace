<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\MerchantKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class MerchantController extends Controller
{
    public function createMerchant(Request $request){

        try {

            $merchant = Merchant::create([
                'name' => $request->name,
                'mail' => $request->mail,
                'gsm' => $request->gsm,
                'tax_office' => $request->taxOffice,
                'tax_number' => $request->taxNumber,
                'legal_company_title' => $request->legalCompanyTitle,
                'address' => $request->address,
                'website' => $request->website,
                'iban' => $request->iban,
                'type' => $request->type,
                'is_active' => "1",
            ]);

            $merchantId = $merchant->id;

            $merchantKey = MerchantKey::create([
                'merchant_id' => $merchantId,
                'merchant_api_key' => str_replace('-', '', Str::uuid()),
                'merchant_secret_key' => str_replace('-', '', Str::uuid()),
            ]);


            return response()->json([
                'message' => "Merchant başarıyla oluşturuldu.",
                "Merchant Keys" => [
                    'merchantId' => $merchantKey->merchant_id,
                    'merchantApiKey' => $merchantKey->merchant_api_key,
                    'merchantSecretKey' => $merchantKey->merchant_secret_key
                ]
            ]);

        } catch (\Throwable $e) {
            return response()->json([
                'message' => 'Parametreler geçersiz.',
                'error' => $e->getMessage()],400);
        }


    }
}
