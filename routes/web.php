<?php

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
    $users = \App\User::latest()
        ->when(request('search'), function ($query, $search) {
            return $query
                ->where('email', 'like', "%$search%")
                ->orWhere('name', 'like', "%$search%");
        })
        ->paginate(100);
    return view('welcome', compact('users'));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
