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
        'product_code',
        'name',
        'slug',
        'description',
        'keywords',
        'barcode',
        'isbn_number',
        'cost_price',
        'attribute',
        'product_unit_id',
        'deductable',
        'price_list1',
        'price_list2',
        'price_list3',
        'price_list4',
        'price_list5',
        'special',
        'special_from',
        'special_to',
        'allow_tax',
        'purchase_tax_type',
        'sales_tax_type',
        'sales_commission_item'
    ];

}
