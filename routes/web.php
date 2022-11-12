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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/edit', 'HomeController@edit')->name('edit');

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:manage-users')->group(function(){
    Route::resource('/users', 'UsersController', ['except' => ['show', 'create', 'store']]);

});

Route::post('home/update', 'HomeController@update')->name("home.update");

Route::resource('basicinformation', 'BasicInformationController');

Route::resource('social', 'SocialController');

Route::resource('contact', 'ContactController');

Route::resource('personal', 'PersonalController');

Route::get('profile/{id}', 'ProfileController@show');

Route::get('/generateVcard/{id}', 'ProfileController@generateVcard')->name('save_contact');

