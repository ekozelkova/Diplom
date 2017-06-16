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

Route::get('/', ['as' => 'index', function () {
    return view('index');
}]);

Route::get('professions/{id}/blocks', function($id) {
	$displayedProfession = App\Profession::find($id);
	
    return view('profession_blocks', ['displayedProfession' => $displayedProfession]);
});

Route::get('professions/{id}/levels', function($id) {
	$displayedProfession = App\Profession::find($id);
	
    return view('profession_levels', ['displayedProfession' => $displayedProfession]);
});

Route::get('professions/{id}', ['as' => 'professions', function($id) {
	$displayedProfession = App\Profession::find($id);
	
    return view('profession', ['displayedProfession' => $displayedProfession]);
}]);

Route::get('/login', ['as' => 'getLogin', function () {
    return view('auth.login');
}]);

Route::post('/login', ['as' => 'postLogin', function (Request $request) {
	
	$name = $request->input('username');
	$password = $request->input('password');
	
	if (Auth::attempt(['name' => $name, 'password' => $password]))
	{
		return redirect()->intended(route('index'));
	}
	else
	{
		return redirect()->intended(route('getLogin'));
	}
}]);

Route::get('/logout', ['as' => 'logout', function () {
	Auth::logout();
	
    return redirect()->intended(route('index'));
}]);
