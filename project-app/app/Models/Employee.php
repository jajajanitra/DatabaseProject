<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = 'employees';
    protected $primaryKey = 'employeeNumber';
    public $timestamps = false;
    const CREATED_AT = 'null';
    const UPDATED_AT = 'null';

    protected $fillable = [
            'employeeNumber',
            'lastName',
            'firstName',
            'extension',
            'email',
            'officeCode',
            'reportsTo',
            'jobTitle'
    ];
}
