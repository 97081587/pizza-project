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
            'plaats' => ['required','max:85'],
            'Bdatum' => 'required'
         ]);

         $form = new bestelgegevens();
         $form->Adres = $request['adres'];
         $form->Postcode = $request['postcode'];
         $form->Plaats = $request['plaats'];
         $form->Bdatum = $request['Bdatum'];
         // $form->user_id = $request['user_id'];
         $value = Session::get('register');
         $value = Session::get('pizzas');

         $value->save();
         $form->save();
         
         //voor de besteld pagina
         if (auth()->check()) {
            $pizzas = auth()->user()->pizzas()->latest('created_at')->get();
            $gegevens =  auth()->user()->bestelgegevens('created_at')->get();
            $Users = auth()->user()->user()->get(); 
         }

         return view('besteld', [
            'pizzas' => $pizzas,
            'gegevens' => $gegevens, 
            'Users' => $Users
        ]);
     }

   // public function NieuwsteGegevens(Request $request) {
   //    $user = User::find(1);
   //    $gebruikersgegevens = $user->gegevens;

   //    return view('besteld');
   // }
     
}