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
Route::get('/', function () {
    return view('Welcome');
});


Route::resource('/Post','PostController');
Auth::routes(['verify'=>true]);
Route::get('/home', 'HomeController@index')->name('home');
//SOLIATE TO APP WITH GITHUB
Route::get('login/github', 'Auth\LoginController@redirectToProvider');


//Views Routes

Route::prefix('View')->group(function () {
    Route::get('Post/Create', 'ViewsController@CreatePost')->name('Post.Create.View');
    Route::get('Post/Edit', 'ViewsController@EditPost')->name('Post.Edit.View');
    Route::get('Post/View', 'ViewsController@ShowPost')->name('Post.Show.View');

});



//Testing


