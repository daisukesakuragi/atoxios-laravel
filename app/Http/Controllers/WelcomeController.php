<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class WelcomeController extends Controller
{
    public function index()
    {
        $articles = Article::all();

        return view('welcome', ['articles' => $articles]);
    }
}
