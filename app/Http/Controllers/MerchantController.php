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

            return response("Merchant başarıyla oluşturuldu.");

        } catch (\Throwable $e) {
            return response()->json($e,404);
        }


    }
}
