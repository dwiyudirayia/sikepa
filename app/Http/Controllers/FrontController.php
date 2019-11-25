<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\CategoryPage;
use App\FilePage;
use App\Testimoni;
use Storage;
class FrontController extends Controller
{
    public function home()
    {
        $bannerArticle = Article::orderBy('created_at', 'desc')->take(3)->get();
        $testimoni = Testimoni::all();
        // $informasi = CategoryPage::with('pages', 'section', 'pages.files')->findOrFail(1);

        return view('layouts.front', compact('bannerArticle', 'testimoni'));
    }
    // public function article() {
    //     $article = Article::paginate(5);
    //     $newArticle = Article::orderBy('created_at', 'DESC')->limit(4)->get();

    //     return view('pages.article', [
    //         'article' => $article,
    //         'newArticle' => $newArticle
    //     ]);
    // }
    // public function articleDetail($id) {
    //     $article = Article::findOrFail($id);
    //     $newArticle = Article::orderBy('created_at', 'DESC')->limit(4)->get();

    //     return view('pages.article-detail', [
    //         'article' => $article,
    //         'newArticle' => $newArticle
    //     ]);
    // }
    // public function downloadPdf($id) {
    //     $filePage = FilePage::findOrFail($id);

    //     return response()->download(public_path('storage/'.$filePage->file));
    // }
    // public function submission() {
    //     return view('pages.submission');
    // }
}
