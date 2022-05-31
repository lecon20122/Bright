<?php

namespace App\Http\Controllers;

use App\Models\Answer;
use App\Models\Category;
use App\Models\Question;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\If_;


class AnswerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Answers = Answer::all();
        return view('admin.modules.answer.index', [
            'answser' => $Answers,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Answers = Answer::all();
        return view('admin.modules.answer.create', [
            'answer' => $Answers,
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
        Answer::create($request->all());
        return Redirect()->back()->with('success', 'Answer Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //public function show($id)
    // {
    //
    //}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Answer $Answers)
    {
        $Answers = Answer::all();
        return view('admin.modules.answer.edit', [
            'Answer' => $Answers,

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update($id, Request $request)
    {
        $Answers = Answer::find($id)->first();
        $Answers->update($request->all());
        return redirect()->to('admin/answer')->with('success', 'answer updated Successfully');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function storeAnswers(Request $request, Category $category)
    {
        $user = auth()->user();
        $totalAnswerYes = 0;
        $totalAnswerNo = 0;
        $totalQuestions = count($request->answers);

        foreach ($request->answers as $question_title => $answer) {

            $question = Question::with('answers')->where('title', $question_title)->first();

            $question->answers()->updateOrCreate(
                [
                    'question_title' => $question_title,
                    'user_id' => $user->id,
                    'question_id' => $question->id,
                ],
                [
                    'answer' => $answer,
                ]
            );

            if ($answer) {
                $totalAnswerYes++;
            } else {
                $totalAnswerNo++;
            }
        }

        $this->updateOrCreateTestScore($user, $category, $totalAnswerYes, $totalAnswerNo, $totalQuestions);
        
        return redirect()->back()->with('success' , 'your answers submitted successfully');
    }

    public function calculatePercentage($totalAnswerYes, $totalQuestions)
    {
        return number_format($totalAnswerYes / $totalQuestions * 100, 0) . '%';
    }

    public function updateOrCreateTestScore($user, $category, $totalAnswerYes, $totalAnswerNo, $totalQuestions)
    {
        $user->testScores()->updateOrCreate(
            [
                'category_id' => $category->id,
                'user_id' => $user->id,
            ],
            [
                'total_yes_answer' => $totalAnswerYes,
                'total_no_answer' => $totalAnswerNo,
                'total_questions' => $totalQuestions,
                'total_score' => $this->calculatePercentage($totalAnswerYes, $totalQuestions),
            ]
        );
    }
}
