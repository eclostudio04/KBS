<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraisingRequest;
use App\Http\Requests\UpdateFundraisingRequest;
use App\Models\category;
use App\Models\fundraiser;
use App\Models\fundraising;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;


use Illuminate\Http\Request;

class FundraisingController extends Controller
{
    // **
    //display a listing of the resource
    public function index()
    {
        // return view('admin.fundraisings.index');
        $user = Auth::user();

        $fundraisingQuery = fundraising::with([
            'category',
            'fundraiser',
            'donaturs'
        ])->orderByDesc('id');

        if ($user->hasRole('fundraiser')) {
            $fundraisingQuery->whereHas('fundraiser', function ($query) use ($user) {
                $query->where('user_id', $user->id);
            });
        }

        $fundraisings = $fundraisingQuery->paginate(10);

        return view('admin.fundraisings.index', compact('fundraisings'));
    }

    //show the form for creating of resource
    public function create()
    {
        $categories = category::all();
        return view('admin.fundraisings.create', compact('categories'));
    }

    //route costume
    public function activate_fundraising(fundraising $fundraising)
    {
        DB::transaction(function () use ($fundraising) {

            // proses validasi penggalangan donasi
            $fundraising->update([
                'is_active' => true
            ]);
        });
        return redirect()->route('admin.fundraisings.show', $fundraising);
    }

    // **
    //display a listing of the resource
    public function store(StoreFundraisingRequest $request)
    {
        // membuat sistem untuk menyimpan data
        // **
        $fundraiser = fundraiser::where('user_id', Auth::user()->id)->first();

        DB::transaction(function () use ($request, $fundraiser) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnail', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            $validated['fundraiser_id'] = $fundraiser->id;
            $validated['is_active'] = false;
            $validated['has_finished'] = false;

            $fundraising = fundraising::create($validated);
        });
        return redirect()->route('admin.fundraisings.index');
    }

    //
    public function show(fundraising $fundraising)
    {
        //
        $totalDonations = $fundraising->totalReachAmount();
        $goalReached = $totalDonations >= $fundraising->target_amount;

        $hasRequestedWithdrawal = $fundraising->withdrawals()->exists();

        $percentage = ($totalDonations / $fundraising->target_amount) * 100;
        if ($percentage > 100) {
            $percentage = 100;
        }

        return view('admin.fundraisings.show', compact('hasRequestedWithdrawal', 'fundraising', 'goalReached', 'percentage', 'totalDonations'));
    }

    //
    public function edit(fundraising $fundraising)
    {
        $categories = category::all();
        return view('admin.fundraisings.edit', compact('fundraising', 'categories'));
    }

    public function update(UpdateFundraisingRequest $request, fundraising $fundraising)
    {
        DB::transaction(function () use ($request, $fundraising) {
            $validated = $request->validated();

            if ($request->hasFile('thumbnail')) {
                $thumbnailPath = $request->file('thumbnail')->store('thumbnails', 'public');
                $validated['thumbnail'] = $thumbnailPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            // proses update data
            $fundraising->update($validated);
        });

        return redirect()->route('admin.fundraisings.show', $fundraising);
    }

    public function destroy(fundraising $fundraising)
    {
        DB::beginTransaction();

        try {
            $fundraising->delete();
            DB::commit();
            return redirect()->route('admin.fundraisings.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.fundraisings.index');
        }
    }
}
