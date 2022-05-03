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
    return redirect(route('login'));
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/birthday', [App\Http\Controllers\HomeController::class, 'birthdayNotification'])->name('birthday');

Route::group(['middleware' => 'auth','namespace' => 'App\Http\Controllers'], function () {
    Route::get('/dashboard','Dashboard\DashboardController@index')->name('dashboard');





    /*
    |--------------------------------------------------------------------------
    | Candidate CRUD
    |--------------------------------------------------------------------------
    |
    */
    Route::group(['as'=>'candidate.', 'prefix'=>'candidate'], function(){
        Route::get('', 'Candidate\CandidateController@index')->name('index');
        Route::get('candidate-data', 'Candidate\CandidateController@getAllData')->name('data');
        Route::get('create', 'Candidate\CandidateController@create')->name('create');
        Route::post('', 'Candidate\CandidateController@store')->name('store');
    });

     /*
    |--------------------------------------------------------------------------
    | Candidate CRUD
    |--------------------------------------------------------------------------
    |
    */



});
