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

Route::middleware('guest')->group(function ()
{
	Route::view('/login', 'auth.login')->name('login');
});

Route::middleware('auth')->group(function(){
    Route::post('/logout', 'AuthController@logout')->name('logout');

    Route::get('/', 'HomeController@index')->name('home');
    Route::view('/setting', 'setting')->name('setting')->middleware('can:isAdmin');

    Route::post('/user/datatables', 'UserController@datatables')->name('user.datatables')->middleware('can:isAdmin');
	
	Route::prefix('rack')->name('rack.')->group(function ()
	{
		Route::view('/', 'rack')->name('index');
		Route::post('/search', 'RackController@search')->name('search');
	});
	
	Route::prefix('book')->name('book.')->group(function ()
	{
		Route::post('/datatables', 'BookController@datatables')->name('datatables');
		Route::post('/search', 'BookController@search')->name('search');
	});
	
	Route::prefix('member')->name('member.')->group(function ()
	{
		Route::post('/datatables', 'MemberController@datatables')->name('datatables');
		Route::post('/search', 'MemberController@search')->name('search');
	});

	Route::prefix('loan')->name('loan.')->group(function ()
	{
		Route::post('/datatables', 'LoanController@datatables')->name('datatables');
		Route::view('/return', 'loan.return')->name('return');
		Route::view('/extend', 'loan.extend')->name('extend');
	});

	Route::resource('book', 'BookController');
	Route::resource('member', 'MemberController', ['except' => ['show']]);
	Route::resource('user', 'UserController', ['except' => ['show']])->middleware('can:isAdmin');
	Route::resource('loan', 'LoanController', ['except' => ['show', 'edit', 'update']]);
});
