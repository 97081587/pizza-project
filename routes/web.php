<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\pizzaController;
use App\Http\Controllers\FormulierController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function() {
    return view ('home');
});

Route::post('/verwerkenpizza', [pizzaController::class, 'import']);

Route::get('/form', function() {
    return view ('formulier');
});

Route::post('/allesverwerken', [FormulierController::class, 'import2']);

Route::get('/besteld',[PizzaController::class, 'export']);

Route::get('/besteld', [FormulierController::class,'export2']);

Route::get('/besteld', function() {
    return view ('besteld');
});



