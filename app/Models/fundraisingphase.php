<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundraisingphase extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fundraisings_id',
        'photo',
        'note'
    ];

    //relasi kardinalitas
    public function fundraisings()
    {
        return $this->belongsTo(fundraising::class);
    }
}
