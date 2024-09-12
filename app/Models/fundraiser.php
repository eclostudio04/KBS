<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundraiser extends Model
{
    use HasFactory;
    //

    //
    protected $fillable = [
        'user_id',
        'is_active'
    ];

    //
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
