<?php

namespace App\Http\Controllers;

use App\Models\fundraiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FundraiserController extends Controller
{
    //
    public function index()
    {
        $user = Auth::user();
        $fundraisers = fundraiser::orderByDesc('id')->get();

        $fundraiserStatus = null;

        if ($user->fundraiser()->exists()) {
            $isFundraiserActive = $user->fundraiser->is_active;
            $fundraiserStatus = $isFundraiserActive ? 'Active' : 'Pending';
        }

        return view('admin.fundraisers.index', compact('fundraiserStatus'));
    }
}
