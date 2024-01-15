<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FormulierController extends Controller
{
     public function import2(Request $request) {
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

         $form->save();

         return view ('besteld');
     }
}