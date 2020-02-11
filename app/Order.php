<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'uid', 'user_id', 'product_id', 'quantity', 'customer_name', 'address', 'contact_details', 'note', 'status', 'is_active'
    ];
}
