<?php

use Illuminate\Support\Facades\Route;
// on importe le namespace du controller qui servira a connecter les méthodes au routes
use App\Http\Controllers\ProductController;



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

// route dynamique product/8 product/1 => pour récupérer l'idée product
Route::get('/products', [ProductController::class, 'index'])->name('sold');

// vous pouvez faire du binding avec le modèle id => instance de la classe Category
// les routes sont avec paramètre (id de la category à afficher )
// Route::get('/category/{category}', [ProductController::class, 'showCate'])->name('sex');

Route::get('/sex/{name}', [ProductController::class, 'showSex'])->name('sex');

// Route::get('/category/{category}', [ProductController::class, 'showCate'])->name('homme');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//les routes pour le formulaire
Route::get('/products/add', [ProductController::class, 'create']);
Route::post('/products/add', [ProductController::class, 'store']);

Route::get('/products/show/{id}', [ProductController::class, 'show']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);

Route::get('/products/destroy/{id}', [ProductController::class, 'destroy']);

