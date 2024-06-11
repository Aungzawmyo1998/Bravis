<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Admin extends Authenticatable
{
    use HasFactory;
    protected $table = 'admins';
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
        return $this->belongsTo(Role::class);

    }

    public function category(): HasMany
    {
        return $this->hasMany(Category::class);
    }
}
