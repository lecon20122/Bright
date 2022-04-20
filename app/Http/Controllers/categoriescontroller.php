<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class categoriescontroller extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('admin.modules.categories.index' ,[
            'categories' => $categories,
        ]);
    }

    function create()
    {
        $categories = Category::get();
        return view('admin.modules.categories.create', [
            'categories' => $categories,
        ]);
    }


    function store(Request $request)
    {
        $categories = Category::create($request->all());
        return Redirect()->back()->with('success', 'Category Added Successfully');
    }


    function edit($id)
    {
        $categories = Category::find($id);
        return view('admin.modules.categories.edit', [
            'categories' => $categories
        ]);
    }


    function update(Request $request, $id)
    {

        $categories = Category::find($id);
        $categories->name = $request->name;
        $categories->save;
        return Redirect('');
    }


    function delete($id)
    {
        $categories = Category::find($id);
        $categories->delete();
        return redirect('');

    }

}
