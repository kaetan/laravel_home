<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\Comment;
use App\User;
use View;

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
        return view('articles.index')->with('articles', $articles);
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

        $lastCommentId = $article->comments()->latest('id')->first()->id;
        $offset = $lastCommentId + 1;

        $comments = $article->loadComments($article, $offset, 5);

        $view = View::make('_partials\comments', [
            'comments' => $comments,
        ]);

        return view('articles.show')->with([
            'article' => $article,
            'view' => $view,
        ]);
    }

    /**
     * Load more comments
     * 
     * @param int $id
     * @param int $offset
     * 
     * @return json object
     */
    public function load($id, $offset)
    {
        $article = Article::findOrFail($id);

        $comments = $article->loadComments($article, $offset, 5);

        $view = (string) View::make('_partials\comments', [
            'comments' => $comments,
        ]);

        return json_encode($view);
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
        //
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
