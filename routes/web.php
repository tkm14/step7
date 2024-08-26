<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\JuiceController;
use Illuminate\Support\Facades\Auth;
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
    if (Auth::check()) {
        return redirect()->route('juices.index');
    } else {
        return redirect()->route('login');
    }
});

Auth::routes();

Route::group(['middleware' => 'auth'], function () {
    Route::resource('juices', JuiceController::class);
});

Route::get('/juices', 'App\Http\Controllers\JuiceController@index')->name('juices.index');

Route::get('/juices/create', 'App\Http\Controllers\JuiceController@create')->name('juice.create');
Route::post('/juices/store', 'App\Http\Controllers\JuiceController@store')->name('juice.store');

Route::get('/juices/edit/{juice}', 'App\Http\Controllers\JuiceController@edit')->name('juice.edit');
Route::put('/juices/edit/{juice}', 'App\Http\Controllers\JuiceController@update')->name('juice.update');

