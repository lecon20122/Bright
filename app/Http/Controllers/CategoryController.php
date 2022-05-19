<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.modules.categories.index', [
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        $categories = Category::get();
        return view('admin.modules.categories.create', [
            'categories' => $categories,
        ]);
    }


    public function store(Request $request)
    {
        Category::create($request->all());
        return Redirect()->back()->with('success', 'Category Added Successfully');
    }


    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('admin.modules.categories.edit', [
            'category' => $category,
            'categories' => $categories
        ]);
    }


    public function update($id, Request $request)
    {
        $category = Category::find($id);
        $category->update($request->all());
        return redirect()->to('admin/categories')->with('success', 'Category updated Successfully');
    }


    public function destroy(int $id)
    {
        $category = Category::find($id);
        $category->delete();
        return redirect()->to('admin/categories')->with('success', 'Category Deleted Successfully');
    }
}
