<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('files/{file}/preview', ['as' => 'file_preview', 'uses' => 'FilesController@preview']);
Route::resource('tasks', 'TaskController');
Route::resource('invoices', 'InvoiceController');
Route::get('invoices/{invoice}/download', 'InvoiceController@download')->name('invoices.download');
Route::resource('tags', 'TagController');
Route::resource('categories', 'CategoriesController');
Route::resource('reports', 'ReportController');

Auth::routes();

Route::get('/home', 'HomeController@index');



