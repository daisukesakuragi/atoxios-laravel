<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;

class AboutUsController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('会社概要');
        SEOTools::setDescription('これは会社概要ページのメタディスクリプションテキストとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->setImage(public_path('images/ogp.jpg'));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'company');
        SEOTools::twitter()->setSite('@atoxios');
        SEOTools::jsonLd()->addImage(public_path('images/ogp.jpg'));

        return view('about-us');
    }
}
