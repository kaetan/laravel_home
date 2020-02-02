<?php


namespace App\Http\ViewComposers;


use App\Article;
use Illuminate\View\View;

class SidebarComposer
{
    protected $topArticles;

    public function __construct()
    {
        $this->topArticles = Article::orderBy('id', 'desc')->take(3)->get();
    }

    public function compose(View $view)
    {
        $view->with('topArticles', $this->topArticles);
    }
}
