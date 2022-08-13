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

    public function createBoard()
    {
        return view('trello.create-board');
    }

    public function storeBoard(Request $request)
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

    public function deleteBoard(Request $request)
    {
        $response = Http::delete('https://api.trello.com/1/boards/'.$request->id.'?key='.$request->key.'&token='.$request->token);
        
        if($response)
        {
            $response = Http::get('https://api.trello.com/1/members/me/boards?key='.$request->key.'&token='.$request->token)->collect();
            $boards = $response->toArray();

            return view('trello.boards',compact('boards'));
        }
    }

    public function editBoard($id)
    {
        $key = Session::get('trello')['key'];
        $token = Session::get('trello')['token'];

        $response = Http::get('https://api.trello.com/1/boards/'.$id.'?key='.$key.'&token='.$token)->collect();
        $board = $response->toArray();

        return view('trello.update-board',compact('board'));
    }

    public function updateBoard(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required'
        ]);

        $response = Http::put('https://api.trello.com/1/boards/'.$request->id.'?name='.$request->name.'&desc='.$request->description.'&key='.$request->key.'&token='.$request->token);
        if($response)
        {
            $response = Http::get('https://api.trello.com/1/members/me/boards?key='.$request->key.'&token='.$request->token)->collect();
            $boards = $response->toArray();

            return view('trello.boards',compact('boards'));
        }
    }

    public function  viewBoard($id)
    {
        $key = Session::get('trello')['key'];
        $token = Session::get('trello')['token'];

        $response = Http::get('https://api.trello.com/1/boards/'.$id.'/lists?key='.$key.'&token='.$token)->collect();
        $lists = $response->toArray();

        $response = Http::get('https://api.trello.com/1/boards/'.$lists[0]['idBoard'].'?key='.$key.'&token='.$token)->collect();
        $board = $response->toArray();

        return view('trello.lists',compact('lists','board'));
    }

    public function  viewCard($id)
    {
        $key = Session::get('trello')['key'];
        $token = Session::get('trello')['token'];

        $response = Http::get('https://api.trello.com/1/lists/'.$id.'/cards?key='.$key.'&token='.$token)->collect();
        $list = $response->toArray();

        if ($list != null) {
            $response = Http::get('https://api.trello.com/1/lists/'.$list[0]['idList'].'?key='.$key.'&token='.$token)->collect();
            $lists = $response->toArray();
            $response = Http::get('https://api.trello.com/1/boards/'.$list[0]['idBoard'].'?key='.$key.'&token='.$token)->collect();
            $board = $response->toArray();
        }else{
            $lists = null;
            $board = null;
        }

        return view('trello.view-cards',compact('list','lists','board','id'));
    }

    public function createList($id)
    {
        return view('trello.create-list',compact('id'));
    }

    public function storeList(Request $request)
    {
        $request->validate([
            'name'        => 'required'
        ]);
        
        $response = Http::post('https://api.trello.com/1/lists?name='.$request->name.'&idBoard='.$request->idBoard.'&key='.$request->key.'&token='.$request->token);
        
        return redirect()->route('view.board',$request->idBoard);

    }

    public function createCard($id)
    {
        return view('trello.create-card',compact('id'));
    }

    
    public function storeCard(Request $request)
    {
        $request->validate([
            'name'        => 'required',
            'description' => 'required'
        ]);

        $response = Http::post('https://api.trello.com/1/cards?name='.$request->name.'&desc='.$request->description.'&idList='.$request->idList.'&key='.$request->key.'&token='.$request->token);

        if ($response) {
           return redirect()->route('view.card',$request->idList);
        }
    }

}
