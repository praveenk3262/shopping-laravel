<?php

use Illuminate\Support\Facades\Route;
use App\Http\controllers\BaseController;
use App\Http\controllers\AdminController;
use App\Http\controllers\CategoryController;
use App\Http\controllers\ProductController;
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

//Route::get('/', function () {
  //  return view('welcome');

//});

Route::get('/home',[BaseController::class,'home'])->name('home');
Route::get('/SpecialOffer',[BaseController::class,'SpecialOffer'])->name('SpecialOffer');
Route::get('/Delivery',[BaseController::class,'Delivery'])->name('Delivery');
Route::get('/cart',[BaseController::class,'cart'])->name('cart');
Route::get('/Productview',[BaseController::class,'Productview'])->name('Productview');
Route::get('/Contact',[BaseController::class,'Contact'])->name('Contact');



Route::get('/admin/login',[AdminController::class,'login'])->name('admin.login');
Route::post('/admin/login',[AdminController::class,'makeLogin'])->name('admin.makeLogin');


Route::group(['middleware' => 'auth'],function(){
  Route::get('/admin/dashboard',[AdminController::class,'dashboard'])->name('admin.dashboard');
  Route::get('/admin/logout', [AdminController::class,'logout'])->name('admin.logout');

  Route::get('/categories', [CategoryController::class,'index'])->name('category.list');
  Route::get('/category/add', [CategoryController::class,'create'])->name('category.create');
  Route::post('/category/add', [CategoryController::class,'store'])->name('category.store');
  Route::get('/categories/edit/{id}', [CategoryController::class,'edit'])->name('category.edit');
  Route::post('/categories/edit/{id}', [CategoryController::class,'update'])->name('category.update');
  Route::post('/category/delete', [CategoryController::class,'destroy'])->name('category.delete');



  Route::get('/products', [ProductController::class,'index'])->name('product.list');
  Route::get('/product/create', [ProductController::class,'create'])->name('product.create');
  Route::post('/product/create', [ProductController::class,'store'])->name('product.store');
  Route::get('/product/edit/{id}', [ProductController::class,'edit'])->name('product.edit');
  Route::post('/product/edit/{id}', [ProductController::class,'update'])->name('product.update');
  Route::post('/product/delete', [ProductController::class,'destroy'])->name('product.delete');
  Route::get('/product/details/{id}', [ProductController::class,'extraDetails'])->name('product.extraDetails');


});