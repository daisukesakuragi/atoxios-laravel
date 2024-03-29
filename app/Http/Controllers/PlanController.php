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

        $plans = Plan::latest('created_at')->paginate(9);

        return view('plans.index', compact('plans'));
    }

    public function show($slug)
    {
        $plan = Plan::with('bids')
            ->select('id', 'member_id', 'slug', 'title', 'eyecatch_img_id', 'eyecatch_img_url', 'description', 'started_at', 'finished_at')
            ->where('slug', $slug)
            ->firstOrFail();

        SEOTools::setTitle($plan->title);
        SEOTools::setDescription($plan->description);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url($plan->eyecatch_img_url));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::setCanonical(url()->current());
        SEOTools::jsonLd()->addImage(url($plan->eyecatch_img_url));

        $bids = $plan->bids()->withTrashed()->limit(10)->get();

        $price = intval(config('app.price_diff'));

        if ($bids && count($bids) > 0) {
            $price = intval($bids[0]->price) + $price;
        }

        return view('plans.show', compact('plan', 'bids', 'price'));
    }
}
