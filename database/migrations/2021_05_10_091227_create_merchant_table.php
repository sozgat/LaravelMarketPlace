<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMerchantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('merchant', function (Blueprint $table) {
            $table->id();
            $table->string("name");
            $table->string("mail")->nullable(false);
            $table->string("gsm");
            $table->string("tax_office")->nullable(false);
            $table->string("tax_number")->nullable(false)->default("12345678");
            $table->string("legal_company_title")->nullable(false);
            $table->string("address")->nullable(false);
            $table->string("website");
            $table->string("iban");
            $table->string("type")->default("UNDEFINED");
            $table->boolean("is_active")->default(1);
            $table->timestamp("created_at")->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('merchant');
    }
}
