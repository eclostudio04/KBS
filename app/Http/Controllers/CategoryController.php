<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
    public function store(StoreCategoryRequest $request)
    {
        // membuat sistem untuk menyimpan data
        // **
        // melakukan validasi di StoreCategoryRequest.php
        DB::transaction(function () use ($request) {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            } else {
                $iconPath = 'images/icons-category-default.png';
            }

            $validated['slug'] = Str::slug($validated['name']);

            // proses penyimpanan data
            $category = category::create($validated);
        });

        // berfungsi untuk menampilkan data yang sudah dibuat di halaman depan kategori
        return redirect()->route('admin.categories.index');
    }

    //
    public function show(category $category) {}

    //
    public function edit(category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }



    //
    public function update(UpdateCategoryRequest $request, category $category)
    {
        DB::transaction(function () use ($request, $category) {
            $validated = $request->validated();

            if ($request->hasFile('icon')) {
                $iconPath = $request->file('icon')->store('icons', 'public');
                $validated['icon'] = $iconPath;
            }

            $validated['slug'] = Str::slug($validated['name']);

            // proses update data
            $category->update($validated);
        });

        return redirect()->route('admin.categories.index');
    }

    //
    public function destroy(category $category)
    {
        DB::beginTransaction();

        try {
            $category->delete();
            DB::commit();
            return redirect()->route('admin.categories.index');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->route('admin.categories.index');
        }
    }
}
