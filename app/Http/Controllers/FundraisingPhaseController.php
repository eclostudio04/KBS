<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StoreFundraisingPhaseRequest;
use App\Models\Fundraising;
use App\Models\FundraisingPhase;
use App\Models\FundraisingWithdrawal;
use Illuminate\Support\Facades\DB;

class FundraisingPhaseController extends Controller
{
    //
    public function index() {}

    //
    public function store(StoreFundraisingPhaseRequest $request, Fundraising $fundraising)
    {
        DB::transaction(function () use ($request, $fundraising) {
            $validated = $request->validated();

            if ($request->hasFile('photo')) {
                $photoPath = $request->file('photo')->store('photos', 'public');
                $validated['photo'] = $photoPath;
            }

            $validated['fundraising_id'] = $fundraising->id;

            $fundraisingPhases = FundraisingPhase::create($validated);

            $withdrawalToUpdate = FundraisingWithdrawal::where('fundraising_id', $fundraising->id)->latest()->first();

            $withdrawalToUpdate->update([
                'has_received' => true
            ]);

            $fundraising->update([
                'has_finished' => true
            ]);
        });

        return redirect()->route('admin.my-withdrawals');
    }
}
