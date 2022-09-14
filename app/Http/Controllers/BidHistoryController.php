<?php

namespace App\Http\Controllers;

use App\Models\Bid;

class BidHistoryController extends Controller
{
    public function index()
    {
        $bids = Bid::with(['user', 'plan'])->where('user_id', auth()->user()->id)->paginate(10);

        return view('bid-history', compact('bids'));
    }
}
