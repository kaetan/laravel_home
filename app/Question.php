<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Traits\Commentable;

class Question extends Model
{
    use Commentable;
}
