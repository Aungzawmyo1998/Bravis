<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class OrderProduct extends Model
{
    // use HasFactory;

    public function orders(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id','id');
    }
    public function products() : BelongsTo
    {
        return $this->belongsTo(Product::class, 'product_id','id');
    }

}
