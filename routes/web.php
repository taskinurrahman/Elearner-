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

//Route::get('/', function () {
//    return view('welcome');
//});

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::group(['prefix' => 'user', 'middleware' => 'auth'], function () {
    Route::get('/dashboard', 'UserController@dashboard')->name('user.dashboard');
    Route::get('/profile', 'UserController@ShowProfile')->name('user.profile');
    Route::post('/update', 'UserController@update')->name('user.update');
});
Route::get('/courses', 'CourseController@userindex')->name('user.courselist');
Route::get('/courses/{id}', 'CourseController@show')->name('user.course');

Route::post('/enroll', 'EnrollController@enroll');

Route::group(['prefix' => 'admin', 'middleware' => 'is_admin'], function () {
    Route::get('/', 'HomeController@adminHome')->name('admin.home');
    Route::get('/fetch_data', 'HomeController@fetch_data');
    Route::get('/courselist', 'CourseController@index')->name('admin.courselist');
    Route::get('/userelist', 'UserController@userlist')->name('admin.userlist');
    Route::get('/addcourse', 'CourseController@addCourse')->name('admin.addcourse');
    Route::post('/storecourse', 'CourseController@store')->name('admin.storecourse');
    Route::get('/editcourse/{id}', 'CourseController@edit')->name('admin.editcourse');
    Route::get('/editcourse/{id}', 'CourseController@edit')->name('admin.editcourse');
    Route::post('/updatecourse', 'CourseController@update')->name('admin.updatecourse');
    Route::post('/deletecourse', 'CourseController@delete')->name('admin.deletecourse');
    Route::post('/deleteuser', 'UserController@delete')->name('admin.deleteuser');
    Route::get('/lessons', function (){
        return view('admin.lessons');
    })->name('admin.lessons');
});

