<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductLevel extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table ='product_levels';
    protected $fillable =[
        'product_id',
        'store_id',
        'on_hand',
        'min_order_level',
        'min_order_quantity'
    ];
}
