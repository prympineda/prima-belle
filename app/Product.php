<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'uid', 'code', 'name', 'sc_id', 'is_active', 'description', 'size', 'price', 'old_price', 'stock', 'is_sale', 'ribbon_tag', 'photo_name'
    ];
}
