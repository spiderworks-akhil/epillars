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



Auth::routes();
Route::get('/sync/pages', 'Admin\DBController@sync_pages')->name('sync_pages');
Route::get('/import/pages', 'Admin\DBController@import_pages')->name('import_pages');
Route::get('/remove_tags', 'Admin\DBController@remove_tags')->name('remove_tags');

Route::get('/','Client\PageController@home');
Route::get('{slug}','Client\PageController@single_page');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function (){
    return redirect('admin/pages');
});
