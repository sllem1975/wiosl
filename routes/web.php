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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::resource('welcome', 'WelcomesController');
Route::get('/', 'WelcomesController@index')->name('welcome');

Auth::routes();
//Route::resource('/auth', 'Register_Controller');

Route::middleware(['auth'])->group(function (){

    

    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/dashboard', 'HomeController@dashboard')->name('home.dashboard');

    Route::resource('/users', 'UsersController')->except([
        'destroy'
    ]);

    Route::resource('/matches', 'MatchesController')->except([
        'destroy'
    ]);

});
