<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Entity;

class Article extends Entity
{
    /**
     * One-to-many relationship
     */
    public function comments()
    {
        return $this->morphMany('App\Comment', 'entity');
    }
}
