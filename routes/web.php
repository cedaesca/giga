<?php

use App\Http\Controllers\DogController;
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
    return redirect()->route('dogs.create');
});

Route::controller(DogController::class)->group(function () {
    Route::get('/dogs/create', 'create')->name('dogs.create');
    Route::post('/dogs', 'store')->name('dogs.store');
});
