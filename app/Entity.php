<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entity extends Model
{
    /**
     * Get comments for a certain entity on the initial load
     * 
     * @param int amount
     * 
     * @return Illuminate\Database\Eloquent\Collection
     */
    public function getComments($amount) 
    {
        $comments = $this->comments()->orderBy('id', 'desc')->take($amount)->get();
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
