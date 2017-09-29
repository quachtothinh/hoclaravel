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
    return view('welcome');
});
Route::get('khoahoc', function (){
	return 'Xin chao cac ban';
});
Route::get('KhoaPham/Laravel', function () {
	echo 'Khoa hoc khoa pham';
});

//Truyen tham so
Route::get('HoTen/{ten}', function ($ten) {
	echo 'Ten cua ban la: '.$ten;
});

Route::get('Laravel/{ngay}', function ($ngay) {
	echo 'Khoa pham ngay: '.$ngay;
})
->where(['ngay' => '[a-zA-Z]+']); //dieu kien cho phep chu cai tu a den z
// ->where(['ngay' => '[0-9]+']); // Dieu kien regular expresion cho phep so

//Dinh danh route cach 1
Route::get('Route1', ['as' => 'MyRoute1', function () {
	echo 'Xin chao cac ban';
}]);

//DInh danh route cach 2
Route::get('Route2', function() {
	echo "Xin chao cac ban Route2";
})->name('MyRoute2');

Route::get('GoiTen', function () {
	return redirect()->route('MyRoute2');
});

Route::group(['prefix' => 'MyGroup'], function () {
	//mo web bang dia chi domain/MyGroup/User1
	Route::get('User1', function () {
		echo "User1";
	});
	Route::get('User2', function () {
		echo "User2";
	});
	Route::get('User3', function () {
		echo 'User3';
	});
	Route::get('User4', function () {
		return redirect()->route('MyRoute2');
	});
});

/*
Cach tao controller php artisan make:controller ten_controller_can_tao
 */

//Goi controller
Route::get('GoiController', 'MyController@XinChao');

//Truyen du lieu cho controller
Route::get('DulieuController/{ten}', 'MyController@KhoaHoc');

Route::get('MyRequest', 'MyController@GetURL');

//Gui Nhan Du lieu den controller thong qua view
Route::get('getForm', function() {
	//Goi view tren file postForm.blade.php
	return view('postForm');
});

// Route::post('postForm', ['as' => 'postForm', 'uses'=> 'MyController@postForm']);
Route::post('postForm', ['uses'=>'MyController@postForm'])->name('MyPostForm');

//Tao cookie 
Route::get('setCookie', 'MyController@setCookie');

//Hien gia tri cookie
Route::get('getCookie', 'MyController@getCookie');

//Hien view upload file'
Route::get('UploadFile', function() {
	return view('postFile');
});

//dua vao du lieu tu view post vao conntroller
Route::post('postFile', ['as'=>'postFile', 'uses' => 'MyController@postFile']);

//Json lay du lieu json tu controller
Route::get('getJson', 'MyController@getJson');

//View
Route::get('myView', 'MyController@myView');

//Truyen du lieu vo View
Route::get('Time/{t}', 'MyController@Time');

//Chia se tham so dung chung khong can truyen vao controller
View::share('KhoaHoc', 'Laravel');

//Blade Template
Route::get('blade', function () {
	return view('pages.php');
});

Route::get('BladeTemplate/{str}', 'MyController@blade');

Route::get('dieukien/{str}', 'MyController@dieukien');