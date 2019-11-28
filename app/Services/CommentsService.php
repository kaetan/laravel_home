<?php

namespace App\Services;

use App\Article;
use App\Comment;

class CommentsService
{
    public static function getComments($article, $offset, $limit)
    {
        $comments = $article->loadComments($article, $offset, $limit);

        $returnHtml = view('_partials\comments')->with('comments', $comments)->render();

        return response()->json(array('success' => true, 'view' => $returnHtml));
    }
}
