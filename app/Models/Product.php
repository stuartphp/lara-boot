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
        'main_image',
        'viewed',
        'is_service',
        'is_active',
        'is_feature',
    ];



}
