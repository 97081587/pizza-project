<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\bestelgegevens;
use App\Models\pizza;
use Illuminate\Http\Request;

class FormulierController extends Controller
{
     public function form(Request $request) {
         //dd($request);
         $validatedData = $request->validate([
            'adres' => 'required',
            'postcode' => ['required','max:12'],
            'plaats' => ['required','max:85'],
            'Bdatum' => 'required',
         ]);
        // dd($request);
         $form = new bestelgegevens();
         $form->Adres = $request['adres'];
         $form->Postcode = $request['postcode'];
         $form->Plaats = $request['plaats'];
         $form->Bdatum = $request['Bdatum'];
         //dd($request);
         $form->save();
         //dd($request);

         $pizzas = pizza::get();
         $gegevens = bestelgegevens::get();
         
         $Users = [];
         if (auth()->check()) {
            $Users = auth()->User()->UserReturn()->get();
         }
         return view('besteld', [
            'pizzas' => $pizzas,
            'gegevens' => $gegevens, 
            'Users' => $Users
        ]);
     }
}