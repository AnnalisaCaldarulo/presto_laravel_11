<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Routing\Controllers\HasMiddleware;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware(): array
    {
        return [
            new Middleware('auth', only: ['create']),
        ];
    }

    public function byCategory(Category $category){
        return view('article.byCategory', ['articles'=>$category->articles, 'category'=>$category]);
    }
    public function index(){
        $articles = Article::take(6)->orderBy('created_at', 'desc')->get();
        return view('article.index', compact('articles'));
    }
    public function create()
    {
        return view('article.create');
    }
}
