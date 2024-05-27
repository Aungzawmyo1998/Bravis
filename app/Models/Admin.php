<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relactions\BelongsTo;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $fileable = [
        'name',
        'email',
        'address',
        'role_id',
        'phone',
        'password',
        'image',
        'uuid',
        'status',

    ];

    public function role(): BelongsTo
    {
        // return $this->belongTo(Role::class,'foreign_key','owner_key');
        return $this->belongsTo(Role::class,'role_id','id');

    }

    // public function category()
    // {
    //     return $this->hasMany(Category::class);
    // }
}
