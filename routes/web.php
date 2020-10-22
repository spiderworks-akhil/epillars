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


Route::get('faq/show/{id}','Client\PageController@faq')->name('faq_show');
Route::get('faq/new/{id}/{obj_id?}','Client\PageController@faq_form')->name('faq_form');
Route::post('faq/save','Client\PageController@faq_save')->name('faq_save');
Route::get('faq/remove/{id}','Client\PageController@faq_remove');

Route::get('banner/show/{id}','Client\PageController@banner')->name('banner_show');
Route::get('banner/new/{id}/{obj_id?}','Client\PageController@banner_form')->name('banner_form');
Route::post('banner/save','Client\PageController@banner_save')->name('banner_save');
Route::get('banner/remove/{id}','Client\PageController@banner_remove');



Route::get('logout',function (){
    \Illuminate\Support\Facades\Auth::logout();
    return redirect('login');
});

Route::get('contact','NotificationConteoller@contact');
Route::get('request-demo','NotificationConteoller@demo');

Route::get('brochure-download/{slug?}','Client\PageController@brochure');
Route::get('{slug}','Client\PageController@single_page');


Route::post('contact','NotificationConteoller@save');
Route::post('brochure','NotificationConteoller@brochure_save');
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', function (){
    return redirect('admin/pages');
});


