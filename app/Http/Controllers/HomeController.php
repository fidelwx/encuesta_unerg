<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\poll;
use App\answer;
use App\user;

class HomeController extends Controller
{
    
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        // dd(Auth::user()->id);
        $respuestas = answer::all();a
        $preguntas = poll::all();
        return view('cuestionario')->with('preguntas',$preguntas)->with('respuestas',$respuestas);
    }

    public function storeAnswer(Request $request)
    {
        $status = "resp";

        $respuesta = new answer;
        $respuesta->answer = $request->respuesta;
        $respuesta->status = $status;
        $respuesta->radios = $request->radios;
        $respuesta->user_id = $request->user_id;
        $respuesta->poll_id = $request->poll_id;
        $respuesta->area_id = $request->area_id;
        $respuesta->save();


        return back();
    }
}
