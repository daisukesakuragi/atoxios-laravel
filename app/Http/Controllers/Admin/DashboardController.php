<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
use App\Models\Bid;
use App\Models\Member;
use App\Models\Plan;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        $articles = Article::limit(3)->orderBy('created_at', 'desc')->get();
        $members = Member::withTrashed()->limit(3)->orderBy('created_at', 'desc')->get();
        $plans = Plan::withTrashed()->limit(3)->orderBy('created_at', 'desc')->get();
        $users = User::withTrashed()->limit(10)->orderBy('created_at', 'desc')->get();
        $bids = Bid::withTrashed()->with('plan')->limit(10)->orderBy('created_at', 'desc')->get();

        return view('admin.dashboard', compact('articles', 'members', 'plans', 'users', 'bids'));
    }
}
