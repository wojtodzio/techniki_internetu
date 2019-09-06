<?php

namespace App;

use Illuminate\Database\Eloquent\Relations\Pivot;

class CartItem extends Pivot
{
    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function totalPrice() {
        return $this->Product->price * $this->quantity;
    }

    protected $fillable = [
        'user_id', 'product_id', 'quantity'
    ];
}
