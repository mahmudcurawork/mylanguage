<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

    public function update(Request $request){

        if($request->requestFor == 'deleteArticle') {
            Article::find($request->articleId)->delete();
        }else{
            Article::where('id', $request->articleId)->update([
                'title' => $request->article_title,
                'reference' => $request->article_link
            ]);
        }

        
    }

    public function index($articleId){
        $articles = Article::where('user_id', Auth::user()->id)
        ->orderBy('created_at', 'desc')
        ->get()
        ;

        if(!count($articles)){
            Article::create([
                'user_id' => Auth::user()->id,
                'title' => 'Anonymous',
                'reference' => 'Collected from unknown place'
            ]);
        }
        

        $variables = [
            'articles' => $articles,
            'articleId' => $articleId
        ];

        $response = View::make('selectFormArticle')->with($variables)->render();
        echo json_encode($response);
    }

    public function view(){
        // $articles = Article::where('user_id', Auth::user()->id)
        // ->orderBy('created_at', 'desc')
        // ->get()
        // ;

        $articles = DB::table('articles as a')
        ->select(DB::raw('a.*,
        count(w.id) as unlearned'))
        ->leftJoin('words as w', 'a.id', '=', 'w.article_id')
        ->where('w.learned', 0)
        ->where('a.user_id', Auth::user()->id)
        ->groupBy('a.id')
        ->get()
        ;

        $variables = [
            'articles' => $articles
        ];

       

        $response = View::make('articlesTable')->with($variables)->render();

        echo json_encode($response);
    }
}
