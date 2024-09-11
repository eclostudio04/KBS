<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class donation extends Model
{
    use HasFactory;
    protected $table = 'Donation';

    protected $fillable = [
        'user_id',
        'donation_date',
        'payment_method',
        'payment_status',
        'amount_donation'
    ];
}
