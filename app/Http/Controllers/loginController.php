<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Session;

class loginController extends Controller
{   
    public function login(Request $request) {
        $validatedData = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['email' => $validatedData['email'], 'password' => $validatedData['password']])) {
            $request->session()->regenerate();
        }

        return redirect('/');
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

        // $register->user_id = auth()->id();
        
        Session::put('registratie', $register);

        auth()->login($register);

        return redirect('/');
    }

    public function logout() {
        auth()->logout();
        return redirect('/');
    }
}
