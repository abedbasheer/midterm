<?php

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
    return view('welcome');
});

Route::get('/contact','contactcontroller@index');
Route::get('/create','contactcontroller@create');
Route::post('/store','contactcontroller@store');
Route::get('/{contact}/edit','contactcontroller@edit');
Route::post('/update/{contact}','contactcontroller@update');
Route::delete('delete/{id}', 'contactcontroller@delete');