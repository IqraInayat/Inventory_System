<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $table = 'sales';
    protected $fillable = ['sale_date', 'product_id', 'quantity', 'total_revenue'];

    // Define relationship with Product model
    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
