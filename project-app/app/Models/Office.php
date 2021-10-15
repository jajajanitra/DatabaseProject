<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Office extends Model
{
    use HasFactory;
    protected $table = 'offices';
    protected $primaryKey = 'officeCode';

    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';

    protected $fillable = [
        'officeCode',
        'city',
        'phone',
        'addressLine1',
        'addressLine2',
        'state',
        'country',
        'postalCode',
        'territory'
    ];
}
