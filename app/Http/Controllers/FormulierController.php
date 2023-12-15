<?php

namespace App\Http\Controllers;

use App\Models\User;
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
         //dd($request);
         //User::create($form);
         $Form->save();
         return view ('formulier');
     }
}