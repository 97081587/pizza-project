<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request) {
        //dd($request);
        $validatedData = $request->validate([
           'email' => ['required', 'email'],
           'password' => ['required', 'min:3']
        ]);
        //dd($request);
        $login = new User();

        $login->email = $request['email'];
        $login->password = $request['password'];

        $login->save();

        $validatedData['password'] = bcrypt($validatedData['password']);
        //dd($validatedData['password']);
        User::create($validatedData);
       
        //dd($request);
        //dd($request);
        return view('home');
    }
}
