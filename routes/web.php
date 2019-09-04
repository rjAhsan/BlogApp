<?php
use App\Post;
use App\Media;


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


Route::resource('/Post','PostController')->middleware('auth');

Auth::routes(['verify'=>true]);

Route::get('/home', 'HomeController@index')->name('home');
//SOLIATE TO APP WITH GITHUB
Route::get('login/github', 'Auth\LoginController@redirectToProvider');
Route::get('login/github/callback', 'Auth\LoginController@handleProviderCallback');

//Views Routes

Route::prefix('View')->group(function () {
    Route::get('Post/Create', 'ViewsController@CreatePost')->name('Post.Create.View');
    Route::get('Post/Edit', 'ViewsController@EditPost')->name('Post.Edit.View');
    Route::get('Post/View/[id]', 'ViewsController@ShowPost')->name('Post.Show.View');

});



//Testing

Route::get('/Testing', function () {
    $posts= Post::find(27)->user_id;
    dd($posts);
    //dd(Auth::user()->id);

});

