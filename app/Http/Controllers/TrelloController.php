<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TrelloController extends Controller
{
    public function index()
    {
        return view('trello.index');
    }

    public function trelloAuth(Request $request)
    {
        $request->validate([
            'key'   => 'required',
            'token' => 'required'
        ]);

        $response = Http::get('https://api.trello.com/1/members/me/boards?key='.$request->key.'&token='.$request->token)->collect();
        $boards = $response->toArray();

        return view('trello.boards',compact('boards'));

    }

}
