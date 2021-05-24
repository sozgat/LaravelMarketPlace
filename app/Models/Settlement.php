<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Settlement extends Model
{
    use HasFactory;

    protected $fillable = [
        'settlement_merchant_id','settlement_payment_id','settlement_total_price',
    ];

    protected $table = 'settlement';
    protected $primaryKey = 'id';
}
