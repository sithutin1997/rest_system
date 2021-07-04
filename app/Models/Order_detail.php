<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order_detail extends Model
{
    use HasFactory;

    public function order()
    {
        return $this->belongsTo('App\Models\Order','order_id');
    }
    public function dish()
    {
        return $this->belongsTo('App\Models\Dish','dish_id');
    }
}
