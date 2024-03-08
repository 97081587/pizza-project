<?php

namespace App\Http\Controllers;

use App\Models\pizza;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class PizzaController extends Controller
{   
    // public function Kosten(Request $request) {
    //     dd();
    //     if (Totaalprijs <= 0) {
    //       alert('selecteer 1 of meer pizzas aub');
    //       return view ('home');  
    //     } 
    // }
    
    public function pizza(Request $request) {
        //dd($request);
        $validatedData = $request->validate([
            'HawaiiList' => ['required', 'min:1'],
            'FunghiList' => ['required', 'min:1'],
            'MargheritaList' => ['required', 'min:1'],
            'Totaalprijs' => 'required',
            'MarinaList' => ['required', 'min:1'],
            'QFormaggiList' => ['required', 'min:1'],
            'BOA' => 'required'
        ]);

        $pizza = new Pizza();
        $pizza->HawaiiList = $request['HawaiiList'];
        $pizza->FunghiList = $request['FunghiList'];
        $pizza->MargheritaList = $request['MargheritaList'];
        $pizza->MarinaList = $request['MarinaList'];
        $pizza->Totaalprijs = $request['Totaalprijs'];
        $pizza->QFormaggiList = $request['QFormaggiList'];
        $pizza->BOA = $request['BOA'];

        Session::put('pizzas', $pizza);

        return view ('formulier'); 
    }
}
