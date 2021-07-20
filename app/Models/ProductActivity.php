<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductActivity extends Model
{
    use HasFactory, SoftDeletes;

    protected $tble ='product_activities';

    protected $fillable =[
        'product_id',
        'action_date',
        'action',
        'notes',
        'document_id',
        'store_id',
        'down',
        'up'
    ];
}
