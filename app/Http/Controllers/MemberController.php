<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Artesaos\SEOTools\Facades\SEOTools;

class MemberController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('出品者一覧');
        SEOTools::setDescription('これは出品者一覧ページのメタディスクリプションテキストとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::setCanonical(url()->current());
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        $members = Member::latest('created_at')->paginate(9);

        return view('members.index', compact('members'));
    }

    public function show($slug)
    {
        $member = Member::with('plans')->where('slug', $slug)->firstOrFail();

        SEOTools::setTitle($member->name);
        SEOTools::setDescription($member->introduction);
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url($member->profile_img_url));
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::setCanonical(url()->current());
        SEOTools::jsonLd()->addImage(url($member->profile_img_url));

        return view('members.show', compact('member'));
    }
}
