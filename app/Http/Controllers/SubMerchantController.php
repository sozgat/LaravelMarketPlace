<?php

namespace App\Http\Controllers;

use App\Models\SubMerchant;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SubMerchantController extends Controller
{
    public function createSubMerchant(int $topMerchantId, int $subMerchantId, string $externalId)
    {
        $subMerchant = SubMerchant::create([
            'top_merchant_id' => $topMerchantId,
            'sub_merchant_id' => $subMerchantId,
            'sub_merchant_key' => str_replace('-', '', Str::uuid()),
            'sub_merchant_external_id' => $externalId,
        ]);

        return $subMerchant;
    }
}
