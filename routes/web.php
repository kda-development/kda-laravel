<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
   return "HOME PAGE";
});

Route::get('/unauthorized', function () {
    $response = [
        'status_code' => 401,
        'message'     => "Unauthorized",
        'result'      => []
    ];
    return response()->json($response, 401);
})->name('unauthorized');
