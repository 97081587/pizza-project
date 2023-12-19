<?php

namespace App\Http\Controllers;

use App\Models\Pizza;
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
            'QFormaggiList' => 'required',
            'Kosten' => 'required',
            'BOA' => 'required'
        ]);
        $pizza = new Pizza();

        $pizza->HawaiiList = $validatedData['HawaiiList'];
        $pizza->FunghiList = $validatedData['FunghiList'];
        $pizza->MargheritaList = $validatedData['MargheritaList'];
        $pizza->MarinaList = $validatedData['MarinaList'];
        $pizza->QFormaggiList = $validatedData['QFormaggiList'];
        $pizza->Kosten = $validatedData['Kosten'];
        $pizza->BOA = $validatedData['BOA'];

        $pizza->save();

       return view ('formulier'); 
    }
}
