<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class report extends Model
{
    use HasFactory;
    protected $table = 'Report';

    protected $fillable = [
        'date_report',
        'total_income',
        'total_expense',
        'balance'
    ];
}
