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

    public function category(Category $category)
    {
        return view('front.views.category', compact('category'));
    }

    public function details(Fundraising $fundraising)
    {
        $goalReached = $fundraising->totalReachAmount() >= $fundraising->target_amount;
        return view('front.views.details', compact('fundraising', 'goalReached'));
    }

    public function support(Fundraising $fundraising)
    {
        return view('front.views.donation', compact('fundraising'));
    }

    public function checkout(Fundraising $fundraising)
    {
        // return view('front.views.checkout', compact('fundraising'));
    }
}
