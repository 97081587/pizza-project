<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\bestelgegevens;
use App\Models\pizza;
use Illuminate\Http\Request;

class FormulierController extends Controller
{
     public function form(Request $request) {
         $validatedData = $request->validate([
            'adres' => 'required',
            'postcode' => ['required','max:12'],
            'plaats' => ['required','max:85'],
            'Bdatum' => 'required'
         ]);

         $form = new bestelgegevens();
         $form->Adres = $request['adres'];
         $form->Postcode = $request['postcode'];
         $form->Plaats = $request['plaats'];
         $form->Bdatum = $request['Bdatum'];

         $form->save();
         
         //voor de besteld pagina
         if (auth()->check()) {
            $pizzas = auth()->user()->pizzas()->orderBy('user_id', 'desc')->get();
            $gegevens =  auth()->user()->bestelgegevens()->get();
            $Users = auth()->user()->user()->get(); 
         }

         return view('besteld', [
            'pizzas' => $pizzas,
            'gegevens' => $gegevens, 
            'Users' => $Users
        ]);
     }
}