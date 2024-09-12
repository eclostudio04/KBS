<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class fundraising extends Model
{
    use HasFactory;
    //

    //
    protected $fillable = [
        'fundraisers_id',
        'categories_id',
        'name',
        'slug',
        'thumbnail',
        'about',
        'is_active',
        'has_finished',
        'target_amount'
    ];

    //
    public function fundraisers()
    {
        return $this->belongsTo(fundraiser::class);
    }

    public function categories()
    {
        return $this->belongsTo(category::class);
    }
}
