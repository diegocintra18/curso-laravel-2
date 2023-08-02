<?php

use App\Http\Controllers\ProductsController;
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
    return view('welcome');
});

Route::middleware('auth')->prefix("/admin")->group(function(){
    Route::get("/produtos", [ProductsController::class, "index"])->name("products.index");
    Route::get("/cadastrar-produto", [ProductsController::class, "create"])->name("products.create");
    Route::post("/salvar-produto", [ProductsController::class, "store"])->name("products.store");
    Route::get("/produto/{id}", [ProductsController::class, "show"])->name("products.show");
    Route::get("/editar-produto/{id}", [ProductsController::class, "edit"])->name("products.edit");
    Route::post("/atualizar-produto/{id}", [ProductsController::class, "update"])->name("products.update");
    Route::get("/excluir-produto/{id}", [ProductsController::class, "destroy"])->name("products.destroy");
});

Route::get('/hello', function () {
    return view('hello-world');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
