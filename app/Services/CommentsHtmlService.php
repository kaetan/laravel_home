<?php

namespace App\Services;

use App\Article;
use App\Comment;

class CommentsHtmlService
{
    public static function getComments($comments)
    {
        $returnHtml = view('_partials\comments')->with('comments', $comments)->render();
        return $returnHtml;
    }
}
