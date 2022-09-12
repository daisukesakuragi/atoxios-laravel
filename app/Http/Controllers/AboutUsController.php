<?php

namespace App\Http\Controllers;

use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Support\Facades\URL;

class AboutUsController extends Controller
{
    public function index()
    {
        SEOTools::setTitle('会社概要');
        SEOTools::setDescription('これは会社概要ページのメタディスクリプションとなります。');
        SEOTools::opengraph()->setUrl(URL::current());
        SEOTools::setCanonical('https://codecasts.com.br/lesson');
        SEOTools::opengraph()->addProperty('type', 'company');
        SEOTools::twitter()->setSite('@atoxios');
        SEOTools::jsonLd()->addImage('https://codecasts.com.br/img/logo.jpg');

        return view('about-us');
    }
}
