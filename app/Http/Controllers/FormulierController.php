<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FormulierController extends Controller
{
     public function form(Request $request) {
         $form = $request->validate([
            'naam' => 'required',
            'adres' => 'required',
            'postcode' => ['required','max:12'],
            'plaats' => ['required','max:85'],
            'Bdatum' => 'required',
         ]);
         dd($request);

         $Form->save();
         return view ('formulier');
     }
}