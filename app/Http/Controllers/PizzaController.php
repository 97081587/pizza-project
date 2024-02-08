<?php

namespace App\Http\Controllers;

use App\Models\pizza;
use Illuminate\Http\Request;

class PizzaController extends Controller
{   
    public function pizza(Request $request) {
        //dd($request);
        $validatedData = $request->validate([
            'HawaiiList' => 'required',
            'FunghiList' => 'required',
            'MargheritaList' => 'required',
            'MarinaList' => 'required',
            'Totaalprijs' => 'required',
            'QFormaggiList' => 'required',
            'BOA' => 'required'
        ]);

        //dd($request);
        $pizza = new Pizza();

        $pizza->HawaiiList = $request->input('HawaiiList');
        $pizza->FunghiList = $request->input('FunghiList');
        $pizza->MargheritaList = $request->input('MargheritaList');
        $pizza->MarinaList = $request->input('MarinaList');
        $pizza->Totaalprijs = $request->input('Totaalprijs');
        $pizza->QFormaggiList = $request->input('QFormaggiList');
        $pizza->BOA = $request->input('BOA');

        $pizza->save();
        //dd($request);
       //return view ('formulier'); 
       return redirect()->route('formulier');
    }
}
