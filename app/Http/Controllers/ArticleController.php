<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOTools;

class ArticleController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('記事一覧');
        SEOTools::setDescription('これは記事一覧ページのメタディスクリプションテキストとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::setCanonical(url()->current());
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        $articles = Article::paginate(9);

        return view('articles.index', compact('articles'));
    }

    public function show($slug)
    {
        $article = Article::where('slug', $slug)->first();

        SEOTools::setTitle($article->title);
        SEOTools::setDescription($article->description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url($article->thumbnail_url));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::setCanonical(url()->current());
        SEOTools::jsonLd()->addImage(url($article->thumbnail_url));

        return view('articles.show', compact('article'));
    }
}
