<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreOrder extends Model
{
    use HasFactory;
    protected $table = 'preOrders';
    protected $primaryKey = 'preOrderNumber';

    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';

    protected $fillable = [
        'preOrderNumber',
        'customerNumber',
        'orderNumber',
        'upFrontPaid'
    ];
}
