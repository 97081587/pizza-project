<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class loginController extends Controller
{
    public function login(Request $request) {
        $validatedData = $request->validate([
           'email' => ['required', 'email', Rule::unique('users', 'email')],
           'password' => ['required', 'min:3']
        ]);

        $login = new User();
        $login->email = $request['email'];
        $login->password = $request['password'];

        //$login->save();

        //gebruikt de id van het huidige gebruiker
        //$validatedData['user_id'] = auth()->id();

        $validatedData['password'] = bcrypt($validatedData['password']);
        $gebruiker = User::create($validatedData);
        auth()->login($gebruiker);

        return redirect('/');
    }
}
