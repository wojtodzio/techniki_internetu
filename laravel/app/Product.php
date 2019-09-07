<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class, 'cart_item')->using(CartItem::class);
    }

    protected $fillable = [
        'name', 'price'
    ];
}
