<?php

namespace App\Services;

class CommentsService
{
    public function getCommentsQuery($article, $offset, $limit)
    {
        return $article
            ->comments()
            ->where('id', '<', $offset)
            ->latest('id')
            ->take($limit)
            ->get()
            ->sortByDesc('id');
    }
}
