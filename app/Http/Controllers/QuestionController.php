<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Question;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index()
    {
        $Questions = Question::paginate(15);
        return view('admin.modules.questions.index', [
            'questions' => $Questions,
        ]);
    }

    public function create()
    {
        $Questions = Question::all();
        return view('admin.modules.questions.create', [
            'questions' => $Questions,
            'categories' => Category::all(),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(Request $request)
    {
        Question::create($request->all());
        return Redirect()->back()->with('success', 'question Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    //public function show($id)
    //{
    //
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param Question $Question
     * @return Application|Factory|View
     */
    public function edit(Question $Question)
    {
        $Questions = Question::all();
        return view('admin.modules.questions.edit', [
                'question'=>$Question,
            'questions' => $Questions,
            'categories' => Category::all(),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return RedirectResponse
     */
    public function update($id, Request $request)
    {
        $Question = Question::find($id)->first();
        $Question->update($request->all());
        return redirect()->to('admin/question')->with('success', 'question updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return RedirectResponse
     */
    public function destroy(int $id)
    {
        try {
            $question = Question::find($id);
            $question->delete();
            return redirect()->to('admin/question')->with('success', 'Question Deleted Successfully');
        } catch (Exception $exception) {
            return redirect()->back()->with('error', 'Something went wrong');
        }
    }
}
