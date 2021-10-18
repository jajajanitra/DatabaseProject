<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'orders';
    protected $primaryKey = 'orderNumber';

    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';
    public $timestamps = false;

    protected $fillable = [
        'orderNumber',
        'orderDate',
        'requiredDate',
        'shippedDate',
        'status',
        'comments',
        'total',
        'pointReceived',
        'orderType',
        'couponNumber',
        'customerNumber',
        'paymentNumber'
    ];
}


