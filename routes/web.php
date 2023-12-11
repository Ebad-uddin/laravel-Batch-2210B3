<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\formController;
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

// Route::get('/form', function () {
//     return view('form');
// });
// Route::post('/form', function () {
//     return view('form');
// });


// handles the view request of the page  
Route::get('/form', [formController::class, 'register']);

// handles the insert request of the page
Route::post('/form', [formController::class, 'data']);

// handles the view request of the page  
Route::get('/std/view', [formController::class, 'std_view']);

// passing the id through route and calling the method 
// named std_dlt from controller class to dlt the data  
Route::get('/std/dlt/{id}', [formController::class, 'std_dlt']);
Route::get('/std/edit/{id}', [formController::class, 'std_edit']);
Route::post('/std/update/{id}', [formController::class, 'std_update']);



