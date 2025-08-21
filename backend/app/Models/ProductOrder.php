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

    protected $fillable = ['product_id', 'customer_id', 'quantity'];

    public function customer(): HasOne {
        return $this->hasOne(User::class, 'id', 'customer_id');
    }

    public function product(): HasOne {
        return $this->hasOne(Product::class, 'id', 'product_id');
    }
}
