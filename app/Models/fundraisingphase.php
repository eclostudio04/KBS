<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundraisingphase extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'fundraising_id',
        'photo',
        'note'
    ];

    //relasi kardinalitas
    public function fundraising()
    {
        return $this->belongsTo(fundraising::class);
    }
}
