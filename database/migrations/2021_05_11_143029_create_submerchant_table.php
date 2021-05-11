<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubmerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('submerchant', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('top_merchant_id')->unsigned();
            $table->string("sub_merchant_key")->nullable(false);
            $table->string("sub_merchant_external_id")->nullable(false);
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
            $table->foreign("top_merchant_id")->references('id')->on('merchant');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('submerchant');
    }
}
