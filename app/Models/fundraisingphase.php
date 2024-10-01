<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FundraisingPhase extends Model
{
    use HasFactory, SoftDeletes;
    //
    protected $table = 'fundraising_phases';

    //
    protected $fillable = [
        'name',
        'fundraising_id',
        'photo',
        'note'
    ];
}
