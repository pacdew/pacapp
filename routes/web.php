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

/*
Route::get('/users/{id}', function ($id) {
    return 'this is user ' .$id;
});

Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/', 'PagesController@index');
Route::get('/about', 'PagesController@about');
Route::get('/tests', 'PagesController@tests');
Route::get('/posts', 'PagesController@posts');
//Route::get('/weightTrackers', 'PagesController@posts');
Route::resource('editor', 'CKEditorController');

Route::resource('tests', 'TestsController');
Route::resource('questions', 'QuestionsController');
Route::resource('options','OptionsController');
Route::resource('results','ResultsController');
Route::resource('posts', 'PostsController');
Route::resource('weightTrackers', 'WeightTrackersController');
Auth::routes();

Route::get('/dashboard', 'DashboardController@index');
