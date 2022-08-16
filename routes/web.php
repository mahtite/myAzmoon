<?php

use App\Models\ProfileUser;
use Illuminate\Support\Facades\Auth;
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


//Admin Route*******************************************************/

Route::prefix('dashboard')->middleware('auth.admin')->group(function ()
{
    Route::get('/', 'Admin\HomeController@index')->name('dashboard');

    Route::resource('azmoon', 'Admin\AzmoonController');

    Route::resource('states', 'Admin\stateController');
    Route::post('/states/multi-deleteS', 'Admin\stateController@multiDelete')->name('states.multi-delete');

    Route::resource('city', 'Admin\CityController');

    Route::resource('users', 'Admin\UserController');

    Route::get('/karname', 'Admin\AzmoonController@karname')->name('karname.all');
    Route::get('/karname/{user}', 'Admin\AzmoonController@karnameUser')->name('karname.user');
    Route::delete('/karname/{user}', 'Admin\AzmoonController@karnameUserDelete')->name('karname.user.del');


    Route::get('chart', 'Admin\ChartController@index')->name('chart');
    Route::get('chart_export', 'Admin\ChartController@getChartData')->name('chart.export');


    Route::post('/users/search','Admin\UserController@showUser')->name('show.User');
    Route::post('/users/multi-delete', 'Admin\UserController@multiDelete')->name('users.multi-delete');

    Route::get('/users/roles/{user}','Admin\UserController@addRole')->name('user.role');
    Route::patch('/user-roles/{user}','Admin\UserController@updateRole')->name('update.roles');

    Route::resource('permissions', 'Admin\PermissionController');
    Route::resource('roles', 'Admin\roleController');

});


//Profile Route*******************************************************/

Route::prefix('profile')->middleware('auth')->group(function (){
    Route::get('/', 'Profile\ProfileController@home')->name('profile');
    Route::get('/file-download', 'Profile\ProfileController@download')->name('file.download');
    Route::post('/uploadfile', 'Profile\ProfileController@upload')->name('upload.profile');
    Route::delete('/deletefile/{profileUser}', 'Profile\ProfileController@deletepic')->name('delete.profile');


    Route::get('/twofactor', 'profile\ProfileController@twofactorauth')->name('twofactor');
    Route::post('/twofactor', 'profile\ProfileController@sendtwofactorauth')->name('send.twoFactor');

    //TWOFACTORTYE PHONEVERIFY
    Route::get('/twofactor/phoneverify', 'profile\ProfileController@getPhoneVerify')->name('phoneVerify');
    Route::post('/twofactor/phoneverify', 'profile\ProfileController@postPhoneVerify');

    Route::get('/karname', 'profile\ProfileController@karname')->name('karname.show');

});

//Front Route*******************************************************/

Route::get('/', 'HomeController@index');
Route::get('azmoon', 'HomeController@azmoon')->name('azmoon')->middleware('auth');
Route::post('azmoon', 'HomeController@postAzmoon')->middleware('auth');
Route::post('e_azmoon', 'HomeController@azmoon3')->name('azmoon3')->middleware('auth');



//Auth Google
Route::get('/auth/google', 'Auth\GoogleAuthController@redirect')->name('auth.google');
Route::get('/auth/google/callback','Auth\GoogleAuthController@callback');

//Auth Token
Route::get('/auth/token', 'Auth\AuthTokenController@getToken')->name('auth.token');
Route::post('/auth/token','Auth\AuthTokenController@postToken');



//states-cities

//Route::get('/register', 'StateCityController@state');

Route::post('get-cities-by-state', 'StateCityController@getCity');


Auth::routes(['verify'=>true]);

