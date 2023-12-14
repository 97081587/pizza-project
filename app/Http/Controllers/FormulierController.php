<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FormulierController extends Controller
{
     public function form(Request $request) {
         //dd($request);
         $form = $request->validate([
             'naam' => 'required',
             'adres' => 'required',
             'postcode' => ['required','max:12'],
             'plaats' => ['required','max:85'],
             'BOA' => 'required',
             'Bdatum' => 'required' ,
             'Kosten' => 'required',
             'HawaiiList' => 'required',
             'FunghiList' => 'required',
             'MargheritaList' => 'required',
             'MarinaList' => 'required',
             'QFormaggiList' => 'required'
         ]);

         $form['postcode'] = bcrypt($form['postcode']);
         $Form->save();

         return view ('besteld');
     }



}
