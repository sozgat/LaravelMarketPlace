<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;


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

            $merchantKeyController = new MerchantKeyController();

            $merchantKey = $merchantKeyController->createMerchantKey($merchantId);

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

    public function getSubMerchant($id,Request $request){

        $subMerchants = Merchant::find($id)->subMerchant;

        return $subMerchants;

    }
}
