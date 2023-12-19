<?php

use App\Actions\Fortify\UpdateUserAvatar;
use App\Http\Controllers\CommentaireController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FavoriController;
use App\Http\Controllers\NoteController;
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

Route::put('/update-avatar', [UpdateUserAvatar::class, 'update'])->name('user.update-avatar');


Route::resource("/scenes", SceneController::class);

Route::put('/favoris/{scene}', [FavoriController::class, 'toggle'])->name('favoris.toggle');

Route::resource('commentaires', CommentaireController::class)->only(["edit", "destroy", 'update']);
Route::post('/scenes/{scene}/commentaires', [CommentaireController::class, 'store'])->name('commentaire.store');

Route::post('/scenes/{scene}/notes', [NoteController::class, 'store'])->name('notes.store');
Route::put("/scenes/{scene}/notes", [NoteController::class, 'update'])->name('notes.update');
