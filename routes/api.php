<?php


use App\Http\Controllers\MerchantController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\SettlementController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/onboarding/merchant', [MerchantController::class, 'createMerchantApi'] );

Route::post('/onboarding/submerchant', [MerchantController::class, 'createSubMerchant'] );

Route::get('/get/submerchantsForMerchant/{id}', [MerchantController::class, 'getAllSubMerchantForMerchantById']);

Route::post('/payment/auth', [PaymentController::class, 'createPaymentApi']);

Route::post('/payment/settlement', [SettlementController::class, 'createSettlement']);
