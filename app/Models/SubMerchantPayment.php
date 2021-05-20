<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubMerchantPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_id','payment_sub_merchant_id','sub_merchant_price'
    ];

    protected $table = 'sub_merchant_payment';
    protected $primaryKey = 'id';

    public function payment(){
        return $this->belongsTo(Payment::class);
    }
}
