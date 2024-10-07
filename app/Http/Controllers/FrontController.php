<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Fundraising;
use Illuminate\Http\Request;

class FrontController extends Controller
{
    //
    public function index()
    {
        // mengambil semua data categori
        $categories = Category::all();

        // mengambil semua data penggalangan dana yang sudah di approve oleh super admin

        $fundraisings = Fundraising::with(['category', 'fundraiser'])
            ->where('is_active', 1)
            ->orderByDesc('id')
            ->get();

        return view('front.views.index', compact('categories', 'fundraisings'));
    }
}
