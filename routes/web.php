<?php

use Illuminate\Support\Facades\Route;
 use App\Http\Controllers\Test;
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
    return view('welcome');
});

Route::get('/1', [Test::class, 'number_one']);
Route::get('/2', [Test::class, 'number_two']);
Route::get('/3', [Test::class, 'number_three']);
Route::get('/4', [Test::class, 'number_four']);
