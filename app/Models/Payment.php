<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'payment_merchant_id','payment_paid_price','is_sub_merchant_payment'
    ];

    protected $table = 'payment';
    protected $primaryKey = 'id';

    public function subMerchantPayment()
    {
        return $this->hasMany(SubMerchantPayment::class, 'payment_id');
    }
}
