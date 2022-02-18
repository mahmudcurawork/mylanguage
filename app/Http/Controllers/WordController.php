<?php

namespace App\Http\Controllers;

use App\Models\Word;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class WordController extends Controller
{
    public function index($wordToLoad)
    {
        if ($wordToLoad) {
            Word::where('word', $wordToLoad)->update([
                'learned' => 0
            ]);
            
            $words = Word::where('word' ,$wordToLoad)
                ->get();
        }else{
            $words = Word::where('user_id', Auth::user()->id)
            ->where('learned', 0)
            ->where('deleted', 0)
            ->get();
        }


        


        $variables = [
            'words' => $words
        ];

        $response = View::make('wordsTable')->with($variables)->render();
        echo json_encode($response);
    }

    public function store(Request $request)
    {

        Word::create([
            'user_id' => Auth::user()->id,
            'word' => $request->word,
            'definition' => $request->definition
        ]);
    }

    public function update(Request $request)
    {

        if ($request->requestFor == 'learned') {
            Word::where('id', $request->wordId)->update([
                'learned' => 1,
                'no_of_read' => $request->noOfRead
            ]);
        } elseif ($request->requestFor == 'delete') {
            Word::where('id', $request->wordId)->update([
                'deleted' => 1
            ]);
        } else {
            Word::where('id', $request->wordId)->update([
                'word' => $request->word,
                'definition' => $request->definition
            ]);
        }
    }
}
