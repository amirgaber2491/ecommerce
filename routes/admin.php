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

use App\Models\Setting;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Route;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

Route::get('test', function (){
    return jsTree();
});

Route::group(['prefix' => LaravelLocalization::setLocale(),
    'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]], function () {
    Route::group(['prefix'=>'admin'], function (){
        Route::group(['middleware'=>'auth:admin'],function (){
            Route::resource('admin', 'AdminController');
            Route::delete('delete/multi', 'AdminController@deleteMulti');

            Route::resource('user', 'UserController');
            Route::delete('delete/multi/users', 'UserController@deleteMulti');
            Route::resource('country', 'CountryController');
            Route::delete('delete/multi/countries', 'CountryController@deleteMulti');
            Route::resource('city', 'CityController');
            Route::delete('delete/multi/cities', 'CityController@deleteMulti');
            Route::resource('state', 'StateController');
            Route::delete('delete/multi/statues', 'StateController@deleteMulti');
            Route::resource('department', 'DepartmentController');
//            Route::delete('delete/multi/departments', 'DepartmentController@deleteMulti');
            Route::resource('triad', 'TriadController');
            Route::delete('delete/multi/triads', 'TriadController@deleteMulti');
            Route::resource('manufact', 'ManufactController');
            Route::delete('delete/multi/manufacts', 'ManufactController@deleteMulti');



            Route::get('setting', 'AdminController@editSetting')->name('admin.setting');
            Route::patch('setting', 'AdminController@updateSetting');
        });

        Route::group(['namespace'=>'AdminAuth'], function (){
            Route::get('dashboard', 'AdminController@index')->name('admin.dashboard')->middleware('auth:admin');
            Route::get('login', 'LoginController@showLoginForm')->name('admin.login');
            Route::post('login', 'LoginController@login');
            Route::post('logout', 'LoginController@logout')->name('admin.logout');
            Route::post('password/email', 'ForgotPasswordController@sendResetLinkEmail')->name('admin.password.email');
            Route::get('password/reset', 'ForgotPasswordController@showLinkRequestForm')->name('admin.password.request');
            Route::post('password/reset', 'ResetPasswordController@reset')->name('admin.password.update');
            Route::get('password/reset/{token}', 'ResetPasswordController@showResetForm')->name('admin.password.reset');
        });


    });
});







