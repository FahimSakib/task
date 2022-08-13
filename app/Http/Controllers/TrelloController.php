<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

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

        Session::put('trello',['key' => $request->key, 'token' => $request->token]);

        $response = Http::get('https://api.trello.com/1/members/me/boards?key='.$request->key.'&token='.$request->token)->collect();
        $boards = $response->toArray();

        return view('trello.boards',compact('boards'));

    }

    public function createCard()
    {
        return view('trello.create-board');
    }

    public function storeCard(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required'
        ]);

        $response = Http::post('https://api.trello.com/1/boards/?name='.$request->name.'&desc='.$request->description.'&key='.$request->key.'&token='.$request->token);

        if($response)
        {
            $response = Http::get('https://api.trello.com/1/members/me/boards?key='.$request->key.'&token='.$request->token)->collect();
            $boards = $response->toArray();

            return view('trello.boards',compact('boards'));
        }
    }

    public function cardDelete(Request $request)
    {
        $response = Http::delete('https://api.trello.com/1/boards/'.$request->id.'?key='.$request->key.'&token='.$request->token);
        
        if($response)
        {
            $response = Http::get('https://api.trello.com/1/members/me/boards?key='.$request->key.'&token='.$request->token)->collect();
            $boards = $response->toArray();

            return view('trello.boards',compact('boards'));
        }
    }

}
