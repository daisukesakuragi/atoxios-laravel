<?php

namespace App\Http\Controllers;

use App\Models\Article;

class WelcomeController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('welcome', ['articles' => $articles]);
    }
}
