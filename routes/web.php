<?php

use Illuminate\Support\Facades\Auth;
use Doctrine\Inflector\WordInflector;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WordController;
use App\Http\Controllers\SearchController;

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

Route::get('/loadWords/{wordToLoad}', [WordController::class, 'index']);
Route::post('/save-word', [WordController::class, 'store']);
Route::post('/update-word', [WordController::class, 'update']);

Route::get('/search-word/{typedString}', [SearchController::class, 'index']);


Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index']);
