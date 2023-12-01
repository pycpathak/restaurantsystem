<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use Illuminate\Support\Facades\Session;


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

// if(Session::has('user') ){
// if(Session::get('user')->name == "admin" ){

Route::get('/adminpage', [HomeController::class, 'admin']);

//users routes below
Route::get('/users', [AdminController::class, 'user']);

Route::get('/deleteuser/{id}', [AdminController::class, 'deleteuser']);



//foodmenu routes below
Route::get('/foodmenu', [AdminController::class, 'foodmenu']);

Route::post('/uploadfood', [AdminController::class, 'uploadfood']);

Route::get('/deletemenu/{id}', [AdminController::class, 'deletemenu']);

Route::get('/updateview/{id}', [AdminController::class, 'updateview']);

Route::post('/updatefood/{id}', [AdminController::class, 'updatefood']);

// reservation routes below

Route::get('/viewreservation', [AdminController::class, 'viewreservation']);

// chefs routes below
Route::get('/viewchef', [AdminController::class, 'viewchef']);

Route::post('/uploadchef', [AdminController::class,'uploadchef' ]);

Route::get('/updatechef/{id}', [AdminController::class, 'updatechef']);

Route::post('/updatefoodchef/{id}', [AdminController::class, 'updatefoodchef']);

Route::get('/deletechef/{id}', [AdminController::class, 'deletechef']);

// Admin order route below

Route::get('/orders', [AdminController::class, 'orders']);

 //  cart routes below

Route::post('/addcart/{id}', [HomeController::class, 'addcart']);

Route::get('/showcart/{id}', [HomeController::class, 'showcart']);

Route::get('/remove/{id}', [HomeController::class, 'remove']);

Route::post('/orderconfirm', [HomeController::class, 'orderconfirm']);

// reservation routes below

Route::post('/reservation', [HomeController::class,'reservation' ]);


// Route::get('/', function () {    return view('welcome'); });
 
Route::get('/', [HomeController::class, 'index']);

Route::get('/login', function(){    return view ('login'); })->name('login');

Route::post('/login', [HomeController::class, 'login']);

Route::get('/register', function(){    return view('register'); })->name('register');

Route::post('/register', [HomeController::class, 'register']);

Route::get('/logout', [HomeController::class, 'logout']);







