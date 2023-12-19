<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\SceneController;
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

Route::view('/', 'accueil');

Route::get('home', function () {
    return view('home');
})->middleware(['auth'])->name('home');

Route::view('a-propos', 'a-propos');

Route::view('contact', 'contact');

Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'submitForm'])->name('contact.submit');

Route::resource("/scenes", SceneController::class);
