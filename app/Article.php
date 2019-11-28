<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Services\CommentsService;

class Article extends Model
{
    /**
     * One-to-many relationship
     */
    public function comments()
    {
        return $this->hasMany('App\Comment');
    }

    /**
     * Load comments for a certain article
     * 
     * @param int id
     * @param int offset
     * @param int limit
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function loadComments($article, $offset, $limit)
    {
        $comments = $article
            ->comments()
            ->where('id', '<', $offset)
            ->latest('id')
            ->take($limit)
            ->get()
            ->sortByDesc('id');
        return $comments;
    }
}
