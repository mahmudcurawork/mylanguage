<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class ArticleController extends Controller
{
    public function store(Request $request)
    {

        Article::create([
            'user_id' => Auth::user()->id,
            'title' => $request->article_title,
            'reference' => $request->article_link
        ]);
    }

    public function index(){
        $articles = Article::all();

        $variables = [
            'articles' => $articles
        ];

        $response = View::make('selectFormArticle')->with($variables)->render();
        echo json_encode($response);
    }
}