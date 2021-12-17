<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\DeparmentController;
use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('form');
// });

Route::get('/', [CustomerController::class, 'index']);
Route::get('/cities', [CityController::class, 'show']);
Route::post('/createCustomer', [CustomerController::class, 'store']);
Route::get('/winner', [CustomerController::class, 'winner']);
Route::get('/export', [CustomerController::class, 'export']);