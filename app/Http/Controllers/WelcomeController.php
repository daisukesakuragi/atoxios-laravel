<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOTools;

class WelcomeController extends Controller
{
    public function index()
    {
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        $articles = Article::limit(6)->get();

        return view('welcome', compact('articles'));
    }
}
