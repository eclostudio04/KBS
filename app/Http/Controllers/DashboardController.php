<?php

namespace App\Http\Controllers;

use App\Models\fundraiser;
use App\Models\fundraisingwithdrawal;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function apply_fundraiser()
    {
        $user = Auth::user();

        DB::transaction(function () use ($user) {
            $validated['user_id'] = $user->id;
            $validated['is_active'] = false;

            fundraiser::create($validated);
        });

        return redirect()->route('admin.fundraisers.index');
    }

    //
    public function my_withdrawals()
    {
        $user = Auth::user();
        $fundraiserId = $user->fundraiser->id;

        $withdrawals = fundraisingwithdrawal::where('fundraiser_id', $fundraiserId)->orderByDesc('id')->get();

        return view('admin.my_withdrawals.index', compact('withdrawals'));
    }

    //
    public function my_withdrawals_details(fundraisingwithdrawal $fundraisingwithdrawal)
    {
        return view('admin.my_withdrawals.details', compact('fundraisingwithdrawal'));
    }
}
