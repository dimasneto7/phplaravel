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

Route::get('/', 'Main@index')->name('index');
Route::get('/login', 'Main@login')->name('login');
Route::post('/login_submit', 'Main@login_submit')->name('login_submit');

Route::get('/home', 'Main@home')->name('home');
Route::get('/logout', 'Main@logout')->name('logout');

Route::get('/aaa', function(){

    $v = [1, 2, 3];

    Tools::teste();
    Tools::printData($v);

    echo 'Olá Mundo';
});
