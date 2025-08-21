<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class ProductOrder extends Model
{
    /** @use HasFactory<\Database\Factories\ProductOrderFactory> */
    use HasFactory;

    public function customer(): BelongsTo {
        return $this->belongsTo(User::class, 'customer_id');
    }

    public function product(): HasOne {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
