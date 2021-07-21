<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductOption extends Model
{
    use HasFactory, SoftDeletes;

    protected $table ='product_options';

    protected $fillable = [
        'product_id',
        'store_id',
        'product_category_id',
        'name',
        'slug',
        'description',
        'product_unit_id',
        'on_hand',
        'deductable',
        'weight_gr',
        'length_cm',
        'width_cm',
        'height_cm',
        'price_list1',
        'price_list2',
        'price_list3',
        'special',
        'special_from',
        'special_to',
        'allow_tax',
        'purchase_tax_type',
        'sales_tax_type',
        'sales_commission_item'
    ];

}
