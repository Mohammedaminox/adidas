<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/categories',[App\Http\Controllers\CategoryController::class, 'index'])->name("categories.index");
Route::get('categories/create',[App\Http\Controllers\CategoryController::class, 'create'])->name("categories.create");
Route::post('/categories',[App\Http\Controllers\CategoryController::class, 'store'])->name("categories.store");
Route::get('/categories/{id}/edit',[App\Http\Controllers\CategoryController::class, 'edit'])->name("categories.edit");
Route::patch('/categories/{id}/update',[App\Http\Controllers\CategoryController::class, 'update'])->name("categories.update");
Route::get('/categories/{id}/delete',[App\Http\Controllers\CategoryController::class, 'delete'])->name("categories.delete");



Route::get('/produits',[App\Http\Controllers\ProduitController::class, 'index'])->name("produits.index");
Route::get('produits/create',[App\Http\Controllers\ProduitController::class, 'create'])->name("produits.create");
Route::post('/produits',[App\Http\Controllers\ProduitController::class, 'store'])->name('produits.store');
Route::get('/produits/{id}/edit',[App\Http\Controllers\ProduitController::class, 'edit'])->name("produits.edit");
Route::patch('/produits/{id}/update',[App\Http\Controllers\ProduitController::class, 'update'])->name("produits.update");
Route::get('/produits/{id}/delete',[App\Http\Controllers\ProduitController::class, 'delete'])->name("produits.delete");


Route::get('/clients',[App\Http\Controllers\ClientController::class, 'index'])->name("clients.index");
Route::get('clients/create',[App\Http\Controllers\ClientController::class, 'create'])->name("clients.create");
Route::post('/clients',[App\Http\Controllers\ClientController::class, 'store'])->name('clients.store');
Route::get('/clients/{id}/edit',[App\Http\Controllers\ClientController::class, 'edit'])->name("clients.edit");
Route::patch('/clients/{id}/update',[App\Http\Controllers\ClientController::class, 'update'])->name("clients.update");
Route::get('/clients/{id}/delete',[App\Http\Controllers\ClientController::class, 'delete'])->name("clients.delete");
// Route::get('/store/{category?}/{item?}', function ($category = null , $item = null) {
    //     if(isset($category)){
//         if(isset($item)){
//             return "<h1>{$item}</h1>";
//         }
//         return "<h1>{$category}</h1>";
//     }
//     return "<h1>MY STORE</h1>";
    
// });
// Route::get('/store', function () {
//     $filter = request('style');
//     if(isset($filter)){
//         return '<h1>you can get <span style = "color: red">'.strip_tags($filter).'</span></h1>';
//     }
//     return '<h1>you can get <span style = "color: red">ALL PRODUCTS</span></h1>';
    
// });
