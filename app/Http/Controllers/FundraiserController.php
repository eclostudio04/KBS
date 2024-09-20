<?php

namespace App\Http\Controllers;

use App\Models\fundraiser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        };

        return view('admin.fundraisers.index', compact('fundraiserStatus', 'fundraisers'));
    }

    //
    public function update(Request $request, fundraiser $fundraiser)
    {
        $user = $fundraiser->user;

        // untuk memberikan validasi aktive
        DB::transaction(function () use ($fundraiser, $user) {
            $fundraiser->update([
                'is_active' => true
            ]);

            if (!$user->hasRole('fundraiser')) {
                $user->assignRole('fundraiser');
            }
        });

        return redirect()->route('admin.fundraisers.index');
    }
}
