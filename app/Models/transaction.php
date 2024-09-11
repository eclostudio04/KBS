<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaction extends Model
{
    use HasFactory;
    protected $table = 'Transaction';

    protected $fillable = [
        'user_id',
        'type',
        'amount_transaction',
        'date_transaction',
        'description'
    ];
}
