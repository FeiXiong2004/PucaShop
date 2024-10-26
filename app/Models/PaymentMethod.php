<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PaymentMethod extends Model
{
    use HasFactory;
    protected $fillable =
    [
        'user_id',
        'user_address_id',
        'payment_method_id',
        'shipping_method_id',
        'voucher_id',
        'status',
        'total_money',
       
    ];
}
