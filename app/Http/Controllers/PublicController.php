<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\File;

class PublicController extends Controller
{
    public function home()
    {
        return view('welcome');
    }

    public function setLanguage($lang)
    {
        App::setLocale($lang);
        session()->put('locale', $lang);

        return redirect()->route('homepage');
    }
}
