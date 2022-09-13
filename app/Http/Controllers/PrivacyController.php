<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;

class PrivacyController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('プライバシーポリシー');
        SEOTools::setDescription('これはプライバシーポリシーページのメタディスクリプションテキストとなります。');
        SEOTools::opengraph()->setUrl(url()->current());
        SEOTools::opengraph()->addProperty('image', url('/images/ogp.jpg'));
        SEOTools::setCanonical(url()->current());
        SEOTools::opengraph()->addProperty('type', 'website');
        SEOTools::jsonLd()->addImage(url('/images/ogp.jpg'));

        return view('privacy');
    }
}
