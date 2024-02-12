<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class loginController extends Controller
{
    public function form(Request $request) {
        //dd($request);
        $validatedData = $request->validate([
           'gebruikersnaam' => 'required',
           'Wachtwoord' => 'required',
        ]);
       // dd($request);
        $form = new User();

        $form->Naam = $request['naam'];
        $form->Adres = $request['adres'];
        //dd($request);
        $form->save();
        //dd($request);
        return view('home');
    }
}
