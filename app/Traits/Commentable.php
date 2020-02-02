<?php

namespace App\Traits;

trait Commentable
{
    /**
     * One-to-many relationship
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    /**
     * Poly relationship
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'entity');
    }

    /**
     * Get comments for a certain entity on the initial load
     *
     * @param int amount
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getComments()
    {
        $comments = $this->comments()->orderBy('id', 'desc')->get();
        return $comments;
    }

    /**
     * Load comments for a certain entity (mainly via ajax)
     *
     * @param int id
     * @param int offset
     * @param int limit
     *
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function loadComments($offset, $limit)
    {
        $comments = $this
            ->comments()
            ->where('id', '<', $offset)
            ->latest('id')
            ->take($limit)
            ->get()
            ->sortByDesc('id');
        return $comments;
    }
}
