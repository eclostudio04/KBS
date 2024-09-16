<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class donatur extends Model
{
    use HasFactory, SoftDeletes;
    //

    //
    protected $fillable = [
        'name',
        'phone_number',
        'fundraisings_id',
        'total_amount',
        'note',
        'is_paid',
        'proof'
    ];

    //
    public function fundraisings()
    {
        return $this->belongsTo(fundraising::class);
    }
}
