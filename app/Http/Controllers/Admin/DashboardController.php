<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::limit(9)->get();

        return view('admin.dashboard', compact('articles'));
    }
}
