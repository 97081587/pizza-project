<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\loginController;
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
Route::post('/registreren', [loginController::class, 'registreren']);
Route::post('/ingelogd', [loginController::class, 'login']);
Route::post('/uitgelogd', [loginController::class, 'logout']);

Route::get('/', function() {
    return view ('home');
});

Route::post('/verwerkenpizza', [pizzaController::class, 'pizza']);

Route::get('/form', function() {
    return view ('formulier');
});

Route::post('/allesverwerken', [FormulierController::class, 'form']);

Route::get('/besteld', function() {
    return view ('besteld');
});



