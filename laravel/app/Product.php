<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class)->using(CartItem::class);
    }

    protected $fillable = [
        'name', 'price'
    ];
}
