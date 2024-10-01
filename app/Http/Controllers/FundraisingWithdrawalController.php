<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraisingWithdrawalRequest;
use App\Http\Requests\UpdateFundraisingWithdrawalRequest;
use Illuminate\Http\Request;
use App\Models\Fundraising;
use App\Models\Fundraiser;
use App\Models\FundraisingWithdrawal;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class FundraisingWithdrawalController extends Controller
{
    //
    public function index()
    {
        $fundraising_withdrawals = FundraisingWithdrawal::orderByDesc('id')->get();
        return view('admin.fundraising_withdrawals.index', compact('fundraising_withdrawals'));
    }

    // fungsi store
    public function store(StoreFundraisingWithdrawalRequest $request, Fundraising $fundraising)
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

    public function show(FundraisingWithdrawal $fundraisingWithdrawal)
    {
        return view('admin.fundraising_withdrawals.show', compact('fundraisingWithdrawal'));
    }

    public function update(UpdateFundraisingWithdrawalRequest $request, FundraisingWithdrawal $fundraisingWithdrawal)
    {
        DB::transaction(function () use ($request, $fundraisingWithdrawal) {
            $validated = $request->validated();

            if ($request->hasFile('proof')) {
                $proofPath = $request->file('proof')->store('proofs', 'public');
                $validated['proof'] = $proofPath;
            }

            $validated['has_sent'] = 1;

            $fundraisingWithdrawal->update($validated);
        });

        return redirect()->route('admin.fundraising_withdrawals.show', $fundraisingWithdrawal);
    }
}
