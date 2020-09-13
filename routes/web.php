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




Route::group(['prefix' => 'inteccardgroup'], function () {
    Route::get('/','HomeController@index');
    Route::get('/news','HomeController@news');
    Route::get('/page/{slug}','PageController@show');

    Route::get('logout','Auth\LoginController@logout')->name('logout');
    Route::get('login','Auth\LoginController@showLoginForm')->name('login');
    Route::post('login','Auth\LoginController@login');
    Route::post('ckeditor/upload','CkeditorController@upload')->name('ckeditor.upload');
});

//admin
Auth::routes();
Route::group(['prefix'=>'/inteccardgroup/admin','middleware' => 'auth','namespace' => 'Backend'], function () {
    Route::get('/', 'DashboardController@index');
    Route::resource('/users','UserController');
    Route::resource('/roles','RoleController');
    Route::resource('/news','NewsController');
    Route::resource('/contents','ContentController');
    Route::resource('/category','CategoryController');
    Route::resource('/photoslide','PhotoSlideController');
    Route::resource('/pages','PageController');
});
