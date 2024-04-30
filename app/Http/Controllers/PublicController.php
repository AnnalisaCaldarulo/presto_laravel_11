<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Article;
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

public function searchArticles (Request $request) {
    $articles = Article::search($request->searched)->where('is_accepted', true)->paginate(10);
    return view('article.index', compact('articles'));
    }
}
