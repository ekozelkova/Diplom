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

use Illuminate\Http\Request;

Route::get('/', function () {
	$professions = DB::table('professions')->get();
	
    return view('index', ['professions' => $professions]);
});

Route::get('/login', function () {
	$professions = DB::table('professions')->get();
	
    return view('auth.login', ['professions' => $professions]);
});

Route::post('/login', ['as' => 'login', function (Request $request) {
	
	$name = $request->input('username');
	$password = $request->input('password');
	
	if (Auth::attempt(['name' => $name, 'password' => $password]))
	{
		return redirect()->intended('/');
	}
	else
	{
		return redirect()->intended('/login');
	}
}]);

Route::get('/logout', function () {
	Auth::logout();
	
    return redirect()->intended('/');
});
