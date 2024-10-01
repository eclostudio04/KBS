<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use App\Models\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    //
    // **
    public function index()
    {
        $categories = Category::all();

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
            $category = Category::create($validated);
        });

        // berfungsi untuk menampilkan data yang sudah dibuat di halaman depan kategori
        return redirect()->route('admin.categories.index');
    }

    //
    public function show(Category $category) {}

    //
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }



    //
    public function update(UpdateCategoryRequest $request, Category $category)
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
    public function destroy(Category $category)
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
