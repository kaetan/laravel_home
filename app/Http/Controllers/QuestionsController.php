<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentsHtmlService;
use App\Question;
use App\Comment;
use App\User;
use Auth;

class QuestionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('questions.index')->with('items', $questions);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $question = Question::findOrFail($id);

        // Amount of comments to get
        $amount = 5;
        $comments = $question->getComments($amount);

        return view('questions.show')->with([
            'item' => $question,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Добавить всяческие проверки, try-catch, вывод ошибок, и все такое прочее
        $params = $request->all();

        $text = $params['text'];
        $isAjax = $params['is_ajax'] ?? false;

        $question = Question::findOrFail($id);
        
        if ($question->user->id != Auth::id()) {
            return abort(403);
        }

        $question->text = $text;
        $question->save();

        return \Response::json(['text' => $text]);
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
}
