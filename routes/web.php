<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\GameController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

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

Route::post('/deleteIncoming/{user}', [UserController::class, 'deleteIncoming'])->middleware('member');
Route::post('/acceptIncoming/{user}', [UserController::class, 'acceptIncoming'])->middleware('member');

Route::post('/deletePending/{user}', [UserController::class, 'deletePending'])->middleware('member');
Route::get('/friends', [UserController::class, 'index'])->middleware('member');

Route::post('/addFriend', [UserController::class, 'addFriend'])->middleware('member');

Route::get('/manageGame', [AdminController::class, 'index'])->middleware('admin');

Route::get('/createGame', [AdminController::class, 'create'])->middleware('admin');
Route::post('/createGame', [AdminController::class, 'store'])->middleware('admin');

Route::get('/updateGame/{game}', [AdminController::class, 'edit'])->middleware('admin');
Route::post('/updateGame/{game}', [AdminController::class, 'update'])->middleware('admin');

Route::post('/deleteGame/{game}', [AdminController::class, 'destroy'])->middleware('admin');

Route::get('/profile', [UserController::class, 'edit'])->middleware('auth');
Route::post('/profile', [UserController::class, 'update'])->middleware('auth');


Route::get('/transactionHistory', [TransactionController::class, 'history'])->middleware('member');

Route::get('/transactionReceipt', [TransactionController::class, 'receipt'])->middleware('member');

Route::get('/transactionInformation', [TransactionController::class, 'create'])->middleware('member');
Route::post('/checkout', [TransactionController::class, 'store'])->middleware('member');

Route::get('/shoppingCart/{user}', [GameController::class, 'showCart'])->middleware('auth');
Route::post('/shoppingCart/{shoppingCart}', [GameController::class, 'destroy'])->middleware('member');

Route::post('/addToCart/{game}', [GameController::class, 'addToCart'])->middleware('auth');

Route::post('/gameDetail/{game}', [GameController::class, 'check']);

Route::get('/gameDetail/{game}', [GameController::class, 'show']);

Route::get('/home', [HomeController::class, 'index']);

Route::get('/', [HomeController::class, 'index']);

Route::get('/register', [RegisterController::class, 'index']);

Route::post('/register', [RegisterController::class, 'store']);

Route::get('/login', [loginController::class, 'index']);

Route::post('/login', [loginController::class, 'authenticate']);

Route::post('/logout', [loginController::class, 'logout'])->middleware('auth');
