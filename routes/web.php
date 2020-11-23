<?php

use App\Http\Controllers\AddMenuController;
use App\Http\Controllers\EditMenuController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MenusController;
use App\Http\Controllers\OrderHistoryController;
use App\Http\Controllers\OrderPageController;
use App\Http\Controllers\OrdersController;
use App\Http\Controllers\StatPageController;
use App\Http\Controllers\TableController;
//use App\Http\Controllers\OrderController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return redirect('/home');
});
Route::get('/', [LoginController::class, 'index']) ;
//Route::get('/home', [HomeController::class, 'index']) ;
Route::middleware(['auth:sanctum', 'verified'])->get('/editMenu', [EditMenuController::class, 'index']) ;
//Route::middleware(['auth:sanctum', 'verified'])->get('/order', [OrdersController::class, 'index']) ;
Route::middleware(['auth:sanctum', 'verified'])->get('/addMenu', [AddMenuController::class, 'index']) ;
//Route::middleware(['auth:sanctum', 'verified'])->get('/stat', [StatPageController::class, 'index']) ;

Route::get('/logout', function (){
    Auth::logout();
    return redirect('/login');
}) ;


//Route::get('/pagelink', 'YourController@callMeDirectlyFromUrl');
Route::get('/sortMenu/{type}', [MenusController::class, 'sort']) ;

Route::middleware(['auth:sanctum', 'verified'])->resource('/menus', MenusController::class) ;
Route::middleware(['auth:sanctum', 'verified'])->resource('/home', TableController::class) ;
Route::middleware(['auth:sanctum', 'verified'])->resource('/order', OrdersController::class) ;
Route::middleware(['auth:sanctum', 'verified'])->resource('/stat', OrderHistoryController::class) ;


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return redirect('/home');
}) ;
