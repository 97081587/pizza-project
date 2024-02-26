<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginEnRegi2 extends Controller
{
    public function login(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $request->session()->regenerate();
        }

        return redirect('/form');
    }

    public function registreren(Request $request) {
        $validatedData = $request->validate([
           'RegiEmail' => ['required', 'email', Rule::unique('users', 'email')],
           'RegiPassword' => ['required', 'min:3']
        ]);

        $register = new User();
        $register->email = $request['RegiEmail'];
        $register->password = $request['RegiPassword'];
        
        $register->password = bcrypt(request('RegiPassword'));
        $register->save();

        auth()->login($register);

        return redirect('/form');
    }
}
