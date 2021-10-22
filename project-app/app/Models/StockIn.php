<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StockIn extends Model
{
    use HasFactory;
    protected $table = 'stockIn';
    protected $primaryKey = 'stockInNumber';
    
    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';
    public $timestamps = false;

    protected $fillable = [
        'stockInNumber',
        'employeeNumber',
        'productCode',
        'quantityToOrder',
        'date'
    ];
}
