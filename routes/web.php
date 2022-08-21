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

Route::get('/','DefaultController@login');
    Route::middleware(['login'])->group(function (){
        Route::get('index','IndexController@index')->name('index');
        Route::post('chatMessageInsertPost','IndexController@chatMessageInsertPost')->name('MessageInsert');
        Route::get('user/settings','SettingsController@index')->name('user/settings');
        Route::get('mback','DefaultController@back')->name('mback');

        Route::post('userSettingsUpdate','SettingsController@settingsUpdate')->name('userSettingsUpdate');
        Route::post('changePassword','SettingsController@changePassword')->name('changePassword');

        Route::get('user/profil/{id}','ProfilController@index');
        Route::post('invitation','invitationController@userInvitation')->name('invitation');

        Route::get('indexChatData','IndexController@indexChatData')->name('indexChatData');
    });


Route::get('page','IndexController@page');


/*Route::get('user/login',function (){
    return view('login');
});*/
Route::get('user/login','DefaultController@login')->name('user/login');
Route::get('user/loginGet', 'DefaultController@login')->name('userLogin');
Route::post('user/loginPost', 'DefaultController@authenticate')->name('authenticate');

Route::get('logout', 'DefaultController@logout')->name('logout');



Route::get('ajaxD','IndexController@ajaxD')->name('ajaxD');
Route::get('ajaxdata','IndexController@ajaxData')->name('ajaxdata');
Route::get('ajax','IndexController@ajax')->name('ajax');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


