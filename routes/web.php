<?php

use App\Mail\EmailTeste;
use Illuminate\Support\Facades\Mail;
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

    Mail::to('dimas_fcn@outlook.com')->send(new EmailTeste());
    echo 'email enviado';
});

Route::get('/final/{hash}', 'Main@final')->name('main_final');

Route::get('/edit/{id_usuario}', 'Main@edit')->name('main_edit');

// upload de ficheiro
Route::post('/upload', 'Main@upload')->name('main_upload');

Route::get('/lista_ficheiros', 'Main@lista_ficheiros')->name('main_lista_ficheiros');
Route::get('/download/{file}', 'Main@download')->name('main_download');
