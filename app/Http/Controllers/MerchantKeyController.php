<?php

namespace App\Http\Controllers;

use App\Models\MerchantKey;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MerchantKeyController extends Controller
{
    public function createMerchantKey(int $merchantId){

        $merchantKey = MerchantKey::create([
            'merchant_id' => $merchantId,
            'merchant_api_key' => str_replace('-', '', Str::uuid()),
            'merchant_secret_key' => str_replace('-', '', Str::uuid()),
        ]);

        return $merchantKey;
    }
}
