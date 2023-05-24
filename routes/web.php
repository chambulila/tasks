<?php

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('/task', 'TaskController');
Route::resource('/categor', 'CategorController');
Route::resource('/priorit', 'PrioritController');
Route::resource('/status', 'StatusController');
Route::get('/task-sort-category/{id}', 'TaskController@task_sort_category')->name('task-sort-category');
Route::get('/task-sort-priority/{id}', 'TaskController@task_sort_priority')->name('task-sort-priority');
