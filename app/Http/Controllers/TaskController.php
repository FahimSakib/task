<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TaskController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function index()
    {
        return view('taskOne.index');
    }

    public function create()
    {   
        $response = Http::get('https://raw.githubusercontent.com/Bit-Code-Technologies/mockapi/main/purchase.json')->collect();

        $value = $response->map(function ($item, $key) {
            return collect($item)->except(['created_at']);
        });

        $result = $value->toArray();

        Purchase::insert($result);

        return redirect()->route('task.one.report');
    }

    public function report()
    {
        $report = Purchase::orderBy('purchase_quantity','desc')->limit('5')->get();
        return view('taskOne.report',compact('report'));
    }

   
}
