<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubMerchantPayment extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_merchant_payment', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('payment_id')->unsigned();
            $table->bigInteger('payment_sub_merchant_id')->unsigned();
            $table->float("sub_merchant_price")->nullable(true);
            $table->boolean("sub_merchant_payment_is_approval")->default(1);
            $table->boolean("sub_merchant_payment_is_settlement")->default(0);
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign("payment_id")->references('id')->on('payment');
            $table->foreign("payment_sub_merchant_id")->references('sub_merchant_id')->on('submerchant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sub_merchant_payment');
    }
}
