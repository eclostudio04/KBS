<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class category extends Model
{
    use HasFactory, SoftDeletes;
    // memberikan akses untuk tabel
    protected $table = 'categories';

    // memberikan akses untuk atribute tabel
    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];

    //
    public function fundraisings()
    {
        return $this->hasMany(fundraising::class);
    }
}
