<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\poll;

class HomeController extends Controller
{
    
    public function __construct()
    {
        // $this->middleware('auth');
    }

    public function index()
    {
        $preguntas = poll::all();
        return view('cuestionario')->with('preguntas',$preguntas);
    }

    public function storeAnswer(Request $request){
        return dd($request);
    }


}
