<?php

namespace App\Http\Controllers;

use App\Models\fundraiser;
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
    public function my_withdrawals() {}
}
