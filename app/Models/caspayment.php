<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class caspayment extends Model
{
    use HasFactory;
    protected $table = 'CasPayment';
    protected $fillable = [
        'user_id',
        'amount_cas',
        'payment_date',
        'payment_status'
    ];
}
