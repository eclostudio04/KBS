<?php

namespace App\Http\Controllers;

use App\Models\fundraising;
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
    public function store(Request $request) {}

    //
    public function show(fundraising $fundraising) {}

    //
    public function edit(fundraising $fundraising) {}
}
