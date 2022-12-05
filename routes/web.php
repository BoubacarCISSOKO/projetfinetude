<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\OrdersController;
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
//     return view('welcome');
// });

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admindashbord', [App\Http\Controllers\HomeController::class, 'admindashbord'])->name('admindashbord');



// fleur
Route::get('/fleurs', [App\Http\Controllers\FleurController::class, 'index'])->name('fleur.index');
Route::get('/fleur/cree', [App\Http\Controllers\FleurController::class, 'create'])->name('fleur.create');
Route::post('/fleur/save', [App\Http\Controllers\FleurController::class, 'store'])->name('fleur.store');
Route::get("fleur/edit/{id}", [App\Http\Controllers\FleurController::class, 'edit'])->name('fleur.edit');
Route::put("fleur/update/{id}", [App\Http\Controllers\FleurController::class, 'update'])->name('fleur.update');
Route::delete("fleur/destroy/{article}", [App\Http\Controllers\FleurController::class, 'destroy'])->name('fleur.destroy');



// panier
Route::get('cart', [App\Http\Controllers\CartController::class, 'cartList'])->name('cart.list');
Route::post('cart', [App\Http\Controllers\CartController::class, 'addToCart'])->name('cart.store');
Route::post('update-cart', [App\Http\Controllers\CartController::class, 'updateCart'])->name('cart.update');
Route::post('remove', [App\Http\Controllers\CartController::class, 'removeCart'])->name('cart.remove');
Route::post('clear', [App\Http\Controllers\CartController::class, 'clearAllCart'])->name('cart.clear');



//commande
Route::middleware('auth')->group(function () {
    Route::get('/commande', [OrdersController::class,'index'])->name('commande.index');
    Route::post('commande/ajouter', [OrdersController::class,'store'])->name('commande.store');
    Route::get('commande/confirmation', [OrdersController::class,'confirmation'])->name('commande.confirmation');
});