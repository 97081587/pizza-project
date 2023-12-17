<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PizzaController extends Controller
{
    public function pizza(Request $request) {
        $pizza = $request->validate([
            'HawaiiList' => 'required',
            'FunghiList' => 'required',
            'MargheritaList' => 'required',
            'MarinaList' => 'required',
            'QFormaggiList' => 'required',
            'Kosten' => 'required',
            'BOA' => 'required'
        ]);
        dd($request);
        
        $pizza->save();
       return view ('besteld'); 
    }
}
