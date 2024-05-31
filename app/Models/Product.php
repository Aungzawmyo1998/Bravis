<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Product extends Model
{
    use HasFactory;

    public function suppliers(): BelongsTo
    {
        return $this->belongsTo(Supplier::class,'supplier_id','id');
    }
    public function categories(): BelongsTo
    {
        return $this->belongsTo(Category::class,'category_id','id');
    }
}
