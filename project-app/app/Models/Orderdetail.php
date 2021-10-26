<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Orderdetail extends Model
{
    use HasFactory;
    protected $table = 'orderdetails';
    protected $primaryKey = 'orderNumber';
    public $timestamps = false;

    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';

    protected $fillable = [
        'orderNumber',
        'productCode',
        'quantityOrdered',
        'priceEach',
        'orderLineNumber'
    ];

}
