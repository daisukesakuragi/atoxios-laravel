<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Artesaos\SEOTools\Facades\SEOTools;

class WelcomeController extends Controller
{
    public function index()
    {
        SEOTools::opengraph()->addProperty('image', public_path('images/ogp.jpg'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(public_path('images/ogp.jpg'));

        $articles = Article::limit(6)->get();

        return view('welcome', compact('articles'));
    }
}
