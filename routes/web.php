<?php
use App\Http\Controllers\CategoryController;
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
Route::get('/products', [ProductController::class, 'index'])->name('productsIndex');

// vous pouvez faire du binding avec le modèle id => instance de la classe Category
// les routes sont avec paramètre (id de la category à afficher )
// Route::get('/category/{category}', [ProductController::class, 'showCate'])->name('sex');

Route::get('/sex/{sex}', [ProductController::class, 'showSex'])->name('sex');

// Route::get('/category/{category}', [ProductController::class, 'showCate'])->name('homme');

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//les routes pour le produit
Route::get('/products/add', [ProductController::class, 'create'])->name('addProduct');
Route::post('/products/add', [ProductController::class, 'store']);

Route::get('/products/show/{id}', [ProductController::class, 'show']);
Route::get('/products/edit/{id}', [ProductController::class, 'edit']);
Route::post('/products/update/{id}', [ProductController::class, 'update']);
Route::get('/products/destroy/{id}', [ProductController::class, 'destroy']);

//les routes pour la categorie
Route::get('/categories/index', [CategoryController::class, 'index']);
Route::get('/categories/index/add', [CategoryController::class, 'create'])->name('addCategory');
Route::post('/categories/index/add', [CategoryController::class, 'store']);

Route::get('/categories/index/show/{id}', [CategoryController::class, 'show']);
Route::get('/categories/index/edit/{id}', [CategoryController::class, 'edit']);
Route::post('/categories/index/update/{id}', [CategoryController::class, 'update']);
Route::get('/categories/index/destroy/{id}', [CategoryController::class, 'destroy']);

