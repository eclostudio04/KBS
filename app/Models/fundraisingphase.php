<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fundraisingphase extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name',
        'fundraising_id',
        'photo',
        'note'
    ];

    //relasi kardinalitas
    public function fundraisings()
    {
        return $this->belongsTo(fundraising::class);
    }
}
