<?php

namespace App\Models;

use App\Models\OrderItem;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'order';

    public function orderitems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
