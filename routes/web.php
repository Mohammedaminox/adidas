<?php

use Illuminate\Support\Facades\Route;



Route::get('/', function () {
    return view('success');
});
Route::get('/success',[App\Http\Controllers\CategoryController::class, 'success']);

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

Route::get('/roles',[App\Http\Controllers\RoleController::class, 'index'])->name("roles.index");
Route::get('roles/create',[App\Http\Controllers\RoleController::class, 'create'])->name("roles.create");
Route::post('/roles',[App\Http\Controllers\RoleController::class, 'store'])->name('roles.store');
Route::get('/roles/{id}/edit',[App\Http\Controllers\RoleController::class, 'edit'])->name("roles.edit");
Route::patch('/roles/{id}/update',[App\Http\Controllers\RoleController::class, 'update'])->name("roles.update");
Route::get('/roles/{id}/delete',[App\Http\Controllers\RoleController::class, 'delete'])->name("roles.delete");


Route::get('/home',[App\Http\Controllers\UserController::class, 'showHome'])->name("users.showHome");
Route::get('/users',[App\Http\Controllers\UserController::class, 'index'])->name("users.index");
Route::get('/users/create',[App\Http\Controllers\UserController::class, 'create'])->name("users.create");
Route::post('/users',[App\Http\Controllers\UserController::class, 'store'])->name("users.store");
Route::get('/users/{id}/edit',[App\Http\Controllers\UserController::class, 'edit'])->name("users.edit");
Route::patch('/users/{id}/update',[App\Http\Controllers\UserController::class, 'update'])->name("users.update");
Route::get('/users/{id}/delete',[App\Http\Controllers\UserController::class, 'delete'])->name("users.delete");
Route::get('/register',[App\Http\Controllers\RegisterController::class, 'register'])->name("auth.register");
Route::get('/login',[App\Http\Controllers\RegisterController::class, 'login'])->name("auth.login");
Route::post('/login',[App\Http\Controllers\RegisterController::class, 'loginPost'])->name("login.post");
Route::post('/register',[App\Http\Controllers\RegisterController::class, 'registerPost'])->name("register.post");





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
