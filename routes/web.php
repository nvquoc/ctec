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

//Home Route
Route::get('/', 'HomeController@getTrangChu');

Route::get('trang/{slug}', 'HomeController@getTrang');

Route::get('loaitin/{slug}', 'HomeController@getLoaiTin');

Route::get('baiviet/{slug}.html', 'HomeController@getBaiViet');


//Login Route
//
Route::get('admin/dangnhap', 'UserController@getDangNhap')->middleware('guest');
Route::post('admin/dangnhap', 'UserController@postDangNhap')->middleware('guest');

//Logout Route
//
Route::get('dangxuat', 'UserController@getDangXuat');

// Admin Route Group
//
Route::group(['prefix' => 'admin', 'middleware' => 'login'], function () {
    Route::get('/', 'PostController@getDanhSach');

    Route::group(['prefix' => 'menu'], function () {
        Route::get('', 'MenuController@getDanhSach');

        Route::post('update', 'MenuController@updateDanhSach')->middleware('admin');

        Route::post('', 'MenuController@postThem');

        Route::get('sua/{id}', 'MenuController@getSua')->where('id', '[0-9]+')->middleware('admin');
        Route::post('sua/{id}', 'MenuController@postSua')->where('id', '[0-9]+')->middleware('admin');

        Route::get('xoa/{id}', 'MenuController@getXoa')->where('id', '[0-9]+')->middleware('admin');
    });

    Route::group(['prefix' => 'baiviet'], function () {
        Route::get('', 'PostController@getDanhSach');
        Route::get('danhsach', 'PostController@getDanhSach');

        Route::get('them', 'PostController@getThem');
        Route::post('them', 'PostController@postThem');

        Route::get('sua/{id}', 'PostController@getSua')->where('id', '[0-9]+');
        Route::post('sua/{id}', 'PostController@postSua')->where('id', '[0-9]+');

        Route::get('xoa/{id?}', 'PostController@getXoa')->where('id', '[0-9]+');
    });

    Route::group(['prefix' => 'loaitin'], function () {
        Route::get('', 'CategoryController@getDanhSach');

        Route::post('', 'CategoryController@postThem')->middleware('admin');

        Route::get('sua/{id}', 'CategoryController@getSua')->where('id', '[0-9]+')->middleware('admin');
        Route::post('sua/{id}', 'CategoryController@postSua')->where('id', '[0-9]+')->middleware('admin');

        Route::get('xoa/{id}', 'CategorController@getXoa')->where('id', '[0-9]+')->middleware('admin');
    });

    Route::group(['prefix' => 'trang'], function () {
        Route::get('', 'PageController@getDanhSach');
        Route::get('danhsach', 'PageController@getDanhSach');

        Route::get('them', 'PageController@getThem')->middleware('admin');
        Route::post('them', 'PageController@postThem')->middleware('admin');

        Route::get('sua/{id}', 'PageController@getSua')->where('id', '[0-9]+')->middleware('admin');
        Route::post('sua/{id}', 'PageController@postSua')->where('id', '[0-9]+')->middleware('admin');

        Route::get('xoa/{id}', 'PageController@getXoa')->where('id', '[0-9]+')->middleware('admin');
    });

    Route::group(['prefix' => 'nguoidung'], function () {
        Route::get('', 'UserController@getDanhSach');
        Route::get('danhsach', 'UserController@getDanhSach');

        Route::get('them', 'UserController@getThem')->middleware('admin');
        Route::post('them', 'UserController@postThem')->middleware('admin');

        Route::get('sua/{id}', 'UserController@getSua')->where('id', '[0-9]+')->middleware('admin');
        Route::post('sua/{id}', 'UserController@postSua')->where('id', '[0-9]+')->middleware('admin');

        Route::get('xoa/{id}', 'UserController@getXoa')->where('id', '[0-9]+')->middleware('admin');
    });

    Route::group(['prefix' => 'hoso'], function () {
        Route::get('', 'UserController@getHoso');
        Route::post('', 'UserController@postHoso');
    });

    Route::get('filemanager', function () {
        return view('admin.filemanager.index');
    })->middleware('admin');

    Route::group(['prefix' => 'slides'], function () {
        Route::get('', 'SlideController@getDanhSach');
        Route::get('danhsach', 'SlideController@getDanhSach');

        Route::get('them', 'SlideController@getThem')->middleware('admin');
        Route::post('them', 'SlideController@postThem')->middleware('admin');

        Route::get('sua/{id}', 'SlideController@getSua')->where('id', '[0-9]+')->middleware('admin');
        Route::post('sua/{id}', 'SlideController@postSua')->where('id', '[0-9]+')->middleware('admin');

        Route::get('xoa/{id}', 'SlideController@getXoa')->where('id', '[0-9]+')->middleware('admin');
    });

    Route::group(['prefix' => 'caidat', 'middleware' => 'admin'], function () {
        Route::get('', 'OptionController@getSua');
        Route::post('', 'OptionController@postSua');
    });
});