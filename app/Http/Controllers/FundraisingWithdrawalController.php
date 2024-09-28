<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraisingWithdrawalRequest;
use Illuminate\Http\Request;
use App\Models\fundraising;
use App\Models\fundraiser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FundraisingWithdrawalController extends Controller
{
    //
    public function index() {}

    // fungsi store
    public function store(StoreFundraisingWithdrawalRequest $request, fundraising $fundraising)
    {
        $hasRequestedWithdrawal = $fundraising->withdrawals()->exists();

        if ($hasRequestedWithdrawal) {
            return redirect()->route('admin.fundraisings.show', $fundraising);
        }

        DB::transaction(function () use ($request, $fundraising) {
            $validated = $request->validated();

            $validated['fundraiser_id'] = Auth::user()->fundraiser->id;
            $validated['has_received'] = false;
            $validated['has_sent'] = false;
            $validated['amount_requested'] = $fundraising->totalReachAmount();
            $validated['amount_received'] = 0;
            $validated['proof'] = 'proof/dummydelivery.png';

            $fundraising->withdrawals()->create($validated);
        });

        return redirect()->route('admin.my-withdrawals');
    }
}
