<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fundraisingwithdrawal extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $table = 'fundraisingwithdrawals';

    //
    protected $fillable = [
        'fundraising_id',
        'fundraiser_id',
        'has_received',
        'has_sent',
        'amount_requested',
        'amount_received',
        'bank_name',
        'bank_account_name',
        'bank_account_number',
        'proof'
    ];

    //
    public function fundraiser()
    {
        return $this->belongsTo(fundraiser::class);
    }

    public function fundraising()
    {
        return $this->belongsTo(fundraising::class);
    }
}
