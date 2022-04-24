<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Questions = Question::all();
        return view('admin.modules.questions.index', [
            'qestions' => $Questions,
        ]);
    }

    public function create()
    {
        $Questions = question::all();
        return view('admin.modules.questions.create', [
            'questions' => $Questions,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        Question::create($request->all());
        return Redirect()->back()->with('success', 'question Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    //{
        //
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(question $Questions)
    {

        $Questions = question::all( );
        return view('admin.modules.questions.edit', [
            'question' => $Questions,
            'questions' => $Questions
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(question $Questions, Request $request)
    {
        $Questions->update($request->all());
        return Redirect()->to('admin/question')->with('success', 'question updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(question $Questions)
    {
        $Questions->delete();
        return redirect('');
    }
}
