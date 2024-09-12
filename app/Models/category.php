<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class category extends Model
{
    use HasFactory;
    // memberikan akses untuk tabel
    protected $table = 'Category';

    // memberikan akses untuk atribute tabel
    protected $fillable = [
        'name',
        'slug',
        'icon'
    ];
}
