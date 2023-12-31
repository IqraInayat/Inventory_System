<?php

namespace App\Models;

use App\Models\Product;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderItem extends Model
{
    use HasFactory;
    protected $primaryKey = 'id';
    protected $table = 'order_items';

    protected $fillable = ['order_id', 'prod_id', 'qty', 'price'];

/**
 *   Get Products that order items own
 * 
 *  @return \Illuminate\Database\Eloquent\Relations\BelongsTo
 */

    public function products():BelongsTo
    {
        return $this->belongsTo(Product::class, 'prod_id','id');
    }
}
