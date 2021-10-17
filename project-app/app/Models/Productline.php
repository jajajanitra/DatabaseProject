<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productline extends Model
{
    use HasFactory;
    protected $table = 'productlines';
    protected $primaryKey = 'productLine';
    protected $keyType = 'string';

    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';

    protected $fillable = [
        'productLine',
        'textDescription',
        'htmlDescription',
        'image'
    ];
}
