<?php

namespace App\Http\Controllers;

use App\Models\Bid;

class MyPageController extends Controller
{
    public function index()
    {
        return view('my-page');
    }
}
