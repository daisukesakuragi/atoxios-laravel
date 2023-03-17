<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Bid;

class BidController extends Controller
{
    public function index()
    {
        $bids = Bid::withTrashed()->with('user')->orderBy('created_at', 'desc')->paginate(20);

        return view('admin.bids.index', compact('bids'));
    }
}
