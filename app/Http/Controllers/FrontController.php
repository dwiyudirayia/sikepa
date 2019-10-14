<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\CategoryPage;
class FrontController extends Controller
{
    public function home()
    {
        $bannerArticle = Article::orderBy('created_at', 'desc')->take(3)->get();
        $populerArticle = Article::orderBy('created_at', 'desc')->take(5)->get();
        $informasi = CategoryPage::with('pages', 'section')->findOrFail(1);

        return view('pages.home', [
            'bannerArticle' => $bannerArticle,
            'populerArticle' => $populerArticle,
            'informasi' => $informasi
        ]);
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
