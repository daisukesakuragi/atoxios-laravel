<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;

class TermsOfUseController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('利用規約');
        SEOTools::setDescription('これは利用規約ページのメタディスクリプションテキストとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        return view('terms-of-use');
    }
}
