<?php

namespace App\Services;

use App\Article;
use App\Comment;

class CommentsHtmlService
{
    public static function renderComments($comments)
    {
        $returnHtml = '';

        if (!empty($comments)) {
            $returnHtml = view('_partials/common-blocks/comments-block')->with('comments', $comments)->render();
        }

        return $returnHtml;
    }
}
