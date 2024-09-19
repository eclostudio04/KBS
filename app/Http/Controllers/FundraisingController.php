<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFundraisingRequest;
use App\Models\fundraising;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class FundraisingController extends Controller
{
    // **
    //display a listing of the resource
    public function index()
    {
        // return view('admin.fundraisings.index');
    }

    //show the form for creating of resource
    public function create() {}

    //route costume
    public function active_fundraising() {}

    // **
    //display a listing of the resource
    public function store(StoreFundraisingRequest $request)
    {
        // membuat sistem untuk menyimpan data
        // **
        // melakukan validasi di StoreFundraisingRequest.php
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('')) {
            }
        });
    }

    //
    public function show(fundraising $fundraising) {}

    //
    public function edit(fundraising $fundraising) {}
}
