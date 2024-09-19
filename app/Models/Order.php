<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    // use HasFactory;

    public function customers(): BelongsTo
    {
        return $this->belongsTo(Customer::class, 'customer_id','id');
    }
    public function orderProducts(): HasMany
    {
        return $this->hasMany(OrderProduct::class);
    }
    public function customerOrder()
    {
        return $this->belongsTo(CustomerOrder::class);
    }
}
