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

    function scopeWithName($query, $name)
    {
        // Split each Name by Spaces
        $names = explode(" ", $name);

        // Search each Name Field for any specified Name
        return Customer::where(function ($query) use ($names) {
            $query->whereIn('firstname', $names);
            $query->orWhere(function ($query) use ($names) {
                $query->whereIn('lastname', $names);
            });
        });
    }
}
