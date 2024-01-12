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
            'BOA' => 'required'
        ]);
        //dd($request);
        $pizza = new Pizza();

        $pizza->HawaiiList = $request['HawaiiList'];
        $pizza->FunghiList = $request['FunghiList'];
        $pizza->MargheritaList = $request['MargheritaList'];
        $pizza->MarinaList = $request['MarinaList'];
        $pizza->QFormaggiList = $request['QFormaggiList'];;
        $pizza->BOA = $request['BOA'];

        $pizza->save();
        dd($request);
       return view ('formulier'); 
    }
}
