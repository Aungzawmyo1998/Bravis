<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Model;

class Customer extends Authenticatable
{
    use HasFactory;
    protected $table = 'customers';
    protected $fillable = [
        'firstname',
        'lastname',
        'email',
        'DOB',
        'joining_date',
        'phonenumber',
        'address',
        'State/region',
        'zipcode',
        'password',
        'image',
        'uuid',

    ];
}
