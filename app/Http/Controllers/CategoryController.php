<?php

namespace App\Http\Controllers;

use App\Models\category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    // **
    public function index()
    {
        $categories = category::all();

        return view('admin.categories.index', compact('categories'));
    }

    //
    public function create()
    {
        return view('admin.categories.create');
    }

    //
    public function store(Request $request) {}

    //
    public function show(category $category) {}

    //
    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }



    //
    public function update(Request $request, category $category) {}

    //
    public function destroy(category $category) {}
}
