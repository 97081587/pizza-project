<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\bestelgegevens;
use App\Models\pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class FormulierController extends Controller
{
     public function form(Request $request) {
         $validatedData = $request->validate([
            'adres' => 'required',
            'postcode' => ['required','max:12'],
            'plaats' => ['required','max:85']
         ]);

         $form = new bestelgegevens();
         $form->Adres = $request['adres'];
         $form->Postcode = $request['postcode'];
         $form->Plaats = $request['plaats'];
         $value = Session::get('register');
         $value = Session::get('pizzas');

         $form->user_id = auth()->id();
         $value->user_id = auth()->id();

         $form->save();
         $value->save();
         
         //voor de besteld pagina
         if (auth()->check()) {
            $pizzas = auth()->user()->pizzas()->latest('created_at')->first();
            $gegevens =  auth()->user()->bestelgegevens()->latest('created_at')->first();
            $Users = auth()->user()->user()->first(); 
         }

         return view('besteld', [
            'pizzas' => $pizzas,
            'gegevens' => $gegevens, 
            'Users' => $Users
        ]);
     }   
}