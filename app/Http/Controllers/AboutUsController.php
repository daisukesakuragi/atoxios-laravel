<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;

class AboutUsController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('会社概要');
        SEOTools::setDescription('これは会社概要ページのメタディスクリプションとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'company');
        SEOTools::twitter()->setSite('@atoxios');
        SEOTools::jsonLd()->addImage(public_path('ogp.jpg'));

        return view('about-us');
    }
}
