<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\pizza;
use Illuminate\Http\Request;

class FormulierController extends Controller
{
     public function form(Request $request) {
         //dd($request);
         $validatedData = $request->validate([
            'naam' => 'required',
            'adres' => 'required',
            'postcode' => ['required','max:12'],
            'plaats' => ['required','max:85'],
            'Bdatum' => 'required',
         ]);
        // dd($request);
         $form = new User();

         $form->Naam = $request['naam'];
         $form->Adres = $request['adres'];
         $form->Postcode = $request['postcode'];
         $form->Plaats = $request['plaats'];
         $form->Bdatum = $request['Bdatum'];
         //dd($request);
         $form->save();
         //dd($request);

         $pizzas = pizza::get();
         $users = user::get();
         return view('besteld', ['pizzas' => $pizzas], ['users' => $form]);
     }
}