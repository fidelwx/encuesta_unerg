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
        $preguntas = poll::all();
        return view('cuestionario')->with('preguntas',$preguntas);
    }

    public function storeAnswer(Request $request)
    {
        $respuesta = answer::create([
                'answer'    => $request->respuesta,
                'radios'    => $request->radios,
                'user_id'   => $request->user_id,
                'poll_id'   => $request->poll_id,
                'area_id'   => $request->area_id,
            ]);

        return back();
    }
}
