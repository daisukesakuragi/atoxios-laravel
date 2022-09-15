<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Artesaos\SEOTools\Facades\SEOTools;

class PlanController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('企画一覧');
        SEOTools::setDescription('これは企画一覧ページのメタディスクリプションテキストとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::setCanonical(url()->current());
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        $plans = Plan::paginate(9);

        return view('plans.index', compact('plans'));
    }

    public function show($slug)
    {
        $plan = Plan::with('bids')->where('slug', $slug)->firstOrFail();

        SEOTools::setTitle($plan->title);
        SEOTools::setDescription($plan->description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url($plan->eyecatch_img_url));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::setCanonical(url()->current());
        SEOTools::jsonLd()->addImage(url($plan->eyecatch_img_url));

        $bids = $plan->bids()->withTrashed()->orderBy('price', 'desc')->limit(10)->get();

        if ($bids && count($bids) > 0) {
            $price = intval($bids[0]->price) + 100000;
        } else {
            $price = 100000;
        }

        return view('plans.show', compact('plan', 'bids', 'price'));
    }
}
