<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class loginController extends Controller
{
    public function login(Request $request) {
        //dd($request);
        $validatedData = $request->validate([
           'Email' => ['required', 'email'],
           'Wachtwoord' => ['required', 'min:3']
        ]);
        //dd($request);
        $login = new User();

        $login->Email = $request['Email'];
        $login->Wachtwoord = $request['Wachtwoord'];
        
        $validatedData['Wachtwoord'] = bcrypt($validatedData['Wachtwoord']);
        User::create($validatedData);
        //dd($request);
        //$login->save();
        //dd($request);
        return view('home');
    }
}
