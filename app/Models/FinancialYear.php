<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialYear extends Model
{
    use HasFactory;

    protected $table = 'financial_years';
    protected $fillable =[
        'company_id',
        'name',
        'start_date',
        'end_date',
        'is_active'
    ];

}
