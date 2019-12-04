<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CommentsHtmlService;
use App\Comment;
use App\Article;
use Auth;

class CommentsController extends Controller
{
    /**
     * Load more comments for the article
     *
     * @param int $id
     * @param int $offset
     *
     * @return json object
     */
    public function getComments(Request $request, $id)
    {
        $article = Article::findOrFail($id);
        $offset = $request->offset;
        $limit = 10;

        $comments = $article->loadComments($offset, $limit);

        $response = CommentsHtmlService::getComments($comments);

        return response()->json(array('success' => true, 'view' => $response));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comment = new Comment();
        $comment->text = $request->text;
        $comment->user()->associate(Auth::id());

        $article = Article::findOrFail($request->article_id);
        $article->comments()->save($comment);

        return redirect()->route('article.show', $article->id);
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
