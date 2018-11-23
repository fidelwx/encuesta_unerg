<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\answer;
use App\poll;
use App\User;
use App\person;

class preguntasController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        $preguntas = poll::orderBy('id','ASC')->paginate('5');
        return view('admin/index')->with('preguntas',$preguntas);
    }

    public function store(Request $request)
    {
        if($request->ajax()){
            $pregunta = poll::create([
                'question'  => $request->question,
                'text'      => $request->text,
            ]);
            return response()->json([
                'msj'   =>  '<span class="col-md-12 alert alert-success">Tu pregunta fue publicada satisfactoriamente, gracias!</span>',
            ]);
        }
    }

    public function show($id)
    {
        //
    }

    public function destroy($id)
    {
        $pregunta = poll::find($id);
        $pregunta->delete();
        return back();
    }
}
