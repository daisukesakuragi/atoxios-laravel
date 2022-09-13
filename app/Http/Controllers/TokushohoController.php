<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;

class TokushohoController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('特定商取引法に基づく表記');
        SEOTools::setDescription('これは特定商取引法に基づく表記ページのメタディスクリプションテキストとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        return view('tokushoho');
    }
}
