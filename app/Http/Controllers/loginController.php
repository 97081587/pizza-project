<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function form(Request $request) {
        //dd($request);
        $validatedData = $request->validate([
           'Emailadres' => ['required', 'email'],
           'Wachtwoord' => ['required', 'min:3'],
        ]);
       // dd($request);
        $form = new User();

        $form->Email = $request['Email'];

        $validatedData['Wachtwoord'] = bcrypt($validatedData['Wachtwoord']);
        //dd($request);
        $form->save();
        //dd($request);
        return view('home');
    }
}
