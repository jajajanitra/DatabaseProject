<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    use HasFactory;
    protected $title = 'coupons';
    protected $primaryKey = 'couponNumber';

    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';

    protected $fillable = [
        'couponNumber',
        'couponCode',
        'couponLimit',
        'couponEXP',
        'discount'
    ];
}
