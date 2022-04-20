<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Redis;

class categoriescontroller extends Controller
{
    function create(){
        $categories=Category::get();
        return view('create',[
            'categories'=>$categories
        ]);
    }


function store(Request $request){

    $categories= new Category();
$categories -> name=$request->name;
$categories->save;
return Redirect('');
}


function edit($id){
    $categories=Category::find($id);
    return view('edit',[
        'categories'=>$categories
    ]);
}


function update(Request $request,$id){

    $categories=Category::find($id);
$categories -> name=$request->name;
$categories->save;
return Redirect('');
}


function delete($id){
    $categories=Category::find($id);
    $categories->delete();
    return redirect('');
   
}

}
