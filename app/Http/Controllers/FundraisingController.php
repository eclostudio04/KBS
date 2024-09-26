<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraisingRequest;
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
            'donatur'
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
    public function activate_fundraising() {}

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
    public function show(fundraising $fundraising) {}

    //
    public function edit(fundraising $fundraising) {}
}
