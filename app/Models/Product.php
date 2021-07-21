<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $fillable =[
        'company_id',
        'code',
        'name',
        'description',
        'slug',
        'keywords',
        'product_category_id',
        'product_unit_id',
        'cost_price',
        'min_order_quantity',
        'viewed',
        'main_image',
        'is_service',
        'is_active',
        'is_feature'
    ];



}
