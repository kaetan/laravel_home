<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Commentable;

class Article extends Model
{
    use Commentable;
}
