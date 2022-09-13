<?php

namespace App\Http\Controllers;

use App\Models\Plan;

class PlanController extends Controller
{
    public function index()
    {
        $plans = Plan::paginate(9);

        return view('plans.index', compact('plans'));
    }

    public function show($slug)
    {
        $plan = Plan::with('bids')->where('slug', $slug)->firstOrFail();
        $bids = $plan->bids()->orderBy('price', 'desc')->limit(10)->get();

        if ($bids && count($bids) > 0) {
            $price = $bids[0]->price + 100000;
        } else {
            $price = 100000;
        }

        return view('plans.show', compact('plan', 'bids', 'price'));
    }
}
