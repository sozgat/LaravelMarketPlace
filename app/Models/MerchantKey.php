<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MerchantKey extends Model
{
    use HasFactory;

    protected $fillable = [
        'merchant_id', 'merchant_api_key', 'merchant_secret_key'
    ];

    protected $table = 'merchant_key';
    protected $primaryKey = 'id';

    public function merchant(){
        return $this->hasOne(Merchant::class);
    }
}
