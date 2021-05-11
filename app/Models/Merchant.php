<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    use HasFactory;

    const PRIVATE_COMPANY = "PRIVATE_COMPANY";
    const LIMITED_OR_JOINT_STOCK_COMPANY  = "LIMITED_OR_JOINT_STOCK_COMPANY";

    protected $fillable = [
        'name', 'mail', 'gsm', 'tax_office', 'tax_number',
        'legal_company_title', 'address', 'website',
        'iban', 'type'
    ];

    protected $table = 'merchant';
    protected $primaryKey = 'id';

    public function merchantKey(){
        return $this->hasOne(MerchantKey::class);
    }

    public function subMerchant(){
        return $this->hasMany(SubMerchant::class, 'top_merchant_id');
    }


}
