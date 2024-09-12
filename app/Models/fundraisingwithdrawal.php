<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundraisingwithdrawal extends Model
{
    use HasFactory;

    //
    protected $fillable = [
        'fundraisings_id',
        'fundraisers_id',
        'has_received',
        'has_set',
        'amount_requested',
        'amount_received',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'proof'
    ];

    //
    public function fundraisers()
    {
        return $this->belongsTo(fundraiser::class);
    }

    public function fundraisings()
    {
        return $this->belongsTo(fundraising::class);
    }
}
