<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\person;

class usuariosController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }

    protected function userpeople(Request $request)
    {
        // dd($request);
        $persona = person::create([
            'firstname' =>  $request['firstname'],
            'lastname'  =>  $request['lastname'],
            'ci'    =>  $request['ci'],
            'telephone' =>  $request['telephone'],
            'area_id'   =>  $request['area_id'],
        ]);

        User::create([
            'name' => $request['firstname'],
            'email' => $request['mail'],
            'password' => Hash::make($request['password']),
            'person_id' =>  $persona->id,
            'role_id'   =>  $request->role_id,
        ]);
        return back();
    }
}
