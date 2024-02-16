<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class loginController extends Controller
{   
    public function login(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $request_session()->regenerate();
        }

        return redirect('/');
    }

    public function registreren(Request $request) {
        $validatedData = $request->validate([
           'RegiEmail' => ['required', 'email', Rule::unique('users', 'email')],
           'RegiPassword' => ['required', 'min:3']
        ]);

        // $register = new User();
        // $register->email = $request['RegiEmail'];
        // $register->password = $request['RegiPassword'];
        
        //gebruikt de id van het huidige gebruiker
        //$validatedData['user_id'] = auth()->id();

        $validatedData['RegiPassword'] = bcrypt($validatedData['RegiPassword']);
        $gebruiker = User::create($validatedData);
        auth()->login($gebruiker);

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
