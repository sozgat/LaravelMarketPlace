<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMerchant extends Model
{
    use HasFactory;

    protected $fillable = [
        'top_merchant_id', 'sub_merchant_id','sub_merchant_key', 'sub_merchant_external_id'
    ];

    protected $table = 'submerchant';
    protected $primaryKey = 'id';

    public function merchant(){
        return $this->belongsTo(Merchant::class);
    }
}
