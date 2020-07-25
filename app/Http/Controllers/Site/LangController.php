<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
    public function setLang($lang){

        if (! in_array($lang, ['en', 'ar', 'fr'])) {
            abort(400);
        }
        App::setLocale($lang);

        Session::put('locale', $lang);


        return redirect()->back();
    }
}
