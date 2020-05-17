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
    return view('public/index');
});

//Route::get('/{any}', 'BlogController@index')->where('any', '^(?!api).*$');

Route::get('/all-blogs','BlogController@getAllBlog');
Route::get('/single-blog/{id}','BlogController@getSingleBlog');
Route::get('/categories','BlogController@getCategories');
Route::get('/categories-blog/{id}','BlogController@getCatBlog');
Route::get('/search','BlogController@seacrhPost');
Route::post('/add-comment','BlogController@addComment');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/user','UserController')->middleware('super');

Route::resource('admin-category','AdminCategoryController');

Route::resource('admin-blog','AdminBlogController');
Route::group(['middleware'=>['super'],['admin']], function (){
    Route::get('admin-blog/unpublish/{id}','AdminBlogController@unpublishedBlog');
    Route::get('admin-blog/publish/{id}','AdminBlogController@publishedBlog');
});

