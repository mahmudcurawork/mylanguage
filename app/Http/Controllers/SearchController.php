<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    //

    public function index($typedString){

        $wildCard = "%$typedString%";

        $word = Word::where('word', 'like' ,$wildCard)
        ->orWhere('definition', 'like' , $wildCard)
        ->get();

        echo json_encode($word);
    }
}
