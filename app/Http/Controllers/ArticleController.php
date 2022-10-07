<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::query()->where('published', true)->get();

        return view('home', [
            'articles' => $articles,
        ]);
    }

    public function show(Article $article) {
        if( !$article->published ) {
            abort(403, 'Unauthorized.');
        }

        return
        view('article.show', [
            'article' => $article,
        ]);
    }
}
