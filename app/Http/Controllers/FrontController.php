<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
class FrontController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }
    public function article() {
        $article = Article::paginate(5);
        $newArticle = Article::orderBy('created_at', 'DESC')->limit(4)->get();

        return view('pages.article', [
            'article' => $article,
            'newArticle' => $newArticle
        ]);
    }
    public function articleDetail($id) {
        $article = Article::findOrFail($id);
        $newArticle = Article::orderBy('created_at', 'DESC')->limit(4)->get();

        return view('pages.article-detail', [
            'article' => $article,
            'newArticle' => $newArticle
        ]);
    }
}
