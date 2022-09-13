<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Member;
use App\Models\Plan;
use Artesaos\SEOTools\Facades\SEOTools;

class WelcomeController extends Controller
{
    public function index()
    {
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        $articles = Article::limit(6)->paginate();
        $members = Member::limit(6)->paginate();
        $plans = Plan::limit(6)->paginate();

        return view('welcome', compact('articles', 'members', 'plans'));
    }
}
