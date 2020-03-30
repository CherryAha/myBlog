<?php
/*
 * @Descripttion:
 * @version:
 * @Author: syt
 * @Create-Date: Do not edit
 * @Update-Date: Do not edit
 */

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

    Auth::routes();

    Route::get('/'    , 'HomeController@index');
    Route::get('/home', 'HomeController@index')->name('home');

    Route::get('user/index','UserIndex@index')->middleware('CheckUser')->name('user.index');
    Route::get('user/article/edit',    'UeditArticle@index')->middleware('CheckUser')->name('uedit.view');
    Route::get('user/article/delete/{id}' , 'UeditArticle@delete')->middleware('CheckUser')->name('uedit.delete');
    Route::get('user/article/update/{id}' , 'UeditArticle@update')->middleware('CheckUser')->name('uedit.update');
    Route::get('user/article/detail/{id}' , 'UeditArticle@detail')->middleware('CheckUser')->name('uedit.detail');
    Route::get('user/article/tag'    , 'UserIndex@tag')->middleware('CheckUser')->name('uedit.tag');
    Route::get('user/article/classify'    , 'UserIndex@classify')->middleware('CheckUser')->name('uedit.classify');

    Route::post('user/article/update_image' , 'UeditArticle@update_image')->middleware('CheckUser')->name('uedit.update.image');
    Route::get('user/article/uedit/config' , 'UeditArticle@config')->middleware('CheckUser')->name('uedit.config');
    Route::post('user/article/save' , 'UeditArticle@save')->middleware('CheckUser')->name('uedit.save');

    Route::any('repository','ArticleController@index');
    Route::get('test','UserIndex@test');

    //get 请求
    Route::get('domain/login','DomainController@login')->middleware('refresh.cookie');
    Route::any('domain/logout','DomainController@logout')->middleware('refresh.cookie');
