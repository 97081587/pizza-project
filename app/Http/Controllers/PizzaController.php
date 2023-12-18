<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function pizza(Request $request) {
        //dd($request);
        $pizza = $request->validate([
            'HawaiiList' => 'required',
            'FunghiList' => 'required',
            'MargheritaList' => 'required',
            'MarinaList' => 'required',
            'QFormaggiList' => 'required',
            //'Kosten' => 'required',
            'BOA' => 'required'
        ]);
        
        $pizza->save();
        //User::create($pizza);
       return view ('formulier'); 
    }
}
