<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FormulierController extends Controller
{
     public function form(Request $request) {
         dd($request);
         $validatedData = $request->validate([
            'naam' => 'required',
            'adres' => 'required',
            'postcode' => ['required','max:12'],
            'plaats' => ['required','max:85'],
            'Bdatum' => 'required',
         ]);
         dd($request);
         $form = new User();

         $form->naam = $validatedData['naam'];
         $form->adres = $validatedData['adres'];
         $form->postcode = $validatedData['postcode'];
         $form->plaats = $validatedData['plaats'];
         $form->Bdatum = $validatedData['Bdatum'];

         $Form->save();

         return view ('besteld');
     }
}