<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentsHtmlService;
use App\Article;
use App\Comment;
use App\User;
use Auth;

class ArticlesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $articles = Article::all();
        return view('articles.index')->with('items', $articles);
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
        $article = Article::findOrFail($id);

        $amount = 5;
        $comments = $article->getComments();
        $countComments = $comments->count();

        $comments = $comments->take($amount);

        return view('articles.show')->with([
            'item' => $article,
            'comments' => $comments,
            'countComments' => $countComments,
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
        // И вообще, надо сделать общий апдейт-сервис
        $params = $request->all();

        $text = $params['text'];
        $isAjax = $params['is_ajax'] ?? false;

        $article = Article::findOrFail($id);

        if ($article->user->id != Auth::id()) {
            return abort(403);
        }

        $article->text = $text;
        $article->save();

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
