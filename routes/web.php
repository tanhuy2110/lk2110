<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
Route::get('login','LoginController@getLogin');
Route::post('login','LoginController@postLogin');

Route::get('','HomeController@getIndex');
Route::get('logout','HomeController@getLogout');


route::get('themsp', function(){
	$sanpham = new App\SanPham();
	$sanpham -> TenSp = "SP1";
	$sanpham -> HinhSP = "adnflad";
	$sanpham -> Gia = 10000;
	$sanpham -> save();
	echo "Da Them SP";
});

route::get('upload',function(){
	return view('postFile');
});
route::post('postFile',[
	'as' => 'postFile',
	'uses' => 'MyController@postFile'
]);