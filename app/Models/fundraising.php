<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class fundraising extends Model
{
    use HasFactory, SoftDeletes;
    //

    //
    protected $fillable = [
        'fundraiser_id',
        'category_id',
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

    public function donaturs()
    {
        return $this->hasMany(donatur::class)->where('is_paid', 1);
    }

    public function totalReachAmount()
    {
        return $this->donaturs()->sum('total_amount');
    }

    public function withdrawals()
    {
        return $this->hasMany(fundraisingwithdrawal::class);
    }
}
