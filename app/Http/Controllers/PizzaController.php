<?php

namespace App\Http\Controllers;

use App\Models\pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PizzaController extends Controller
{     
    public function pizza(Request $request) {
        //dd($request);
        $validatedData = $request->validate([
            'HawaiiList' => 'required',
            'FunghiList' => 'required',
            'MargheritaList' => 'required',
            'Totaalprijs' => 'required|numeric|min:1',
            'MarinaList' => 'required',
            'QFormaggiList' => 'required',
            'BOA' => 'required',
            'Bdatum' => 'required'
        ]);

        $pizza = new Pizza();
        $pizza->HawaiiList = $request['HawaiiList'];
        $pizza->FunghiList = $request['FunghiList'];
        $pizza->MargheritaList = $request['MargheritaList'];
        $pizza->MarinaList = $request['MarinaList'];
        $pizza->Totaalprijs = $request['Totaalprijs'];
        $pizza->QFormaggiList = $request['QFormaggiList'];
        $pizza->BOA = $request['BOA'];
        $pizza->Bdatum = $request['Bdatum'];

        Session::put('pizzas', $pizza);

        return view ('formulier'); 
    }
}
