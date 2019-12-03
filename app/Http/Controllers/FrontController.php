<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use App\FAQ;
use App\Testimoni;
use App\Page;
class FrontController extends Controller
{
    public function home()
    {
        $bannerArticle = Article::orderBy('created_at', 'desc')->take(3)->get();
        $article = Article::orderBy('created_at', 'desc')->take(8)->get();
        $testimoni = Testimoni::all();
        // $informasi = CategoryPage::with('pages', 'section', 'pages.files')->findOrFail(1);

        return view('pages.home', compact('bannerArticle', 'testimoni', 'article'));
    }
    public function about($slug) {
        $about = Page::where('url', $slug)->firstOrFail();

        return view('pages.about', compact('about'));
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
    public function faq() {
        $faq = FAQ::all();

        return view('pages.faq', compact('faq'));
    }
    public function article() {
        $article = Article::paginate(1);

        return view('pages.article', compact('article'));
    }
}
