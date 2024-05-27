<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use App\Models\Admin;

class Role extends Model
{
    use HasFactory;

    public function staff (): HasMany
    {
        return $this->hasMany(Admin::class);
    }
}
