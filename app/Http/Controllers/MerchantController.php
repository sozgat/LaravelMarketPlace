<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use App\Models\MerchantKey;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


class MerchantController extends Controller
{
    public function createMerchantApi(Request $request){

        try {

            $merchant = $this->createMerchant($request);

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

    public function createSubMerchant(Request $request){

        $topMerchantId = DB::table('merchant_key')
            ->where('merchant_api_key', '=', $request->apiKey)
            ->where('merchant_secret_key', '=', $request->secretKey)
            ->value('merchant_id');

        if ($topMerchantId === null){
            return response()->json([
                'message' => 'apikey veya secretKey geçersiz.'],400);
        }


        $subMerchant = $this->createMerchant($request);
        $submerchantId = $subMerchant->id;

        $subMerchantController = new SubMerchantController();
        $subMerchant = $subMerchantController->createSubMerchant($topMerchantId, $submerchantId ,$request->subMerchantExternalId);

        return response()->json([
            'message' => "SubMerchant başarıyla oluşturuldu.",
            "Merchant Keys" => [
                'topMerchantId' => $subMerchant->top_merchant_id,
                'subMerchantId' => $subMerchant->sub_merchant_id,
                'subMerchantKey' => $subMerchant->sub_merchant_key,
                'subMerchantExternalId' => $subMerchant->sub_merchant_external_id
            ]
        ]);
    }

    public function getAllSubMerchantForMerchantById($id,Request $request){

        $subMerchants = Merchant::find($id)->subMerchant;

        return $subMerchants;

    }

    public function createMerchant($data){

        return $merchant = Merchant::create([
            'name' => $data->name,
            'mail' => $data->mail,
            'gsm' => $data->gsm,
            'tax_office' => $data->taxOffice,
            'tax_number' => $data->taxNumber,
            'legal_company_title' => $data->legalCompanyTitle,
            'address' => $data->address,
            'website' => $data->website,
            'iban' => $data->iban,
            'type' => $data->type,
            'is_active' => "1",
        ]);
    }
}
