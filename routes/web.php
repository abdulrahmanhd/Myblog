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
    return view('index');
});
// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/posts', 'PageController@posts'); // get to all posts
Route::get('/posts/{post}', 'PageController@post'); // get to post one


Route::post('/posts/{post}/store', 'CommentsController@store'); // Add comment
Route::get('/category/{name}', 'PageController@category');  //get category with posts
// Auth register
Route::get('/registered', 'RegisterController@create'); // get route register
Route::post('/register/store', 'RegisterController@store'); // add new user register
// Auth login
Route::get('/login', 'LoginController@create'); // get route register
Route::post('/login', 'LoginController@store'); // add new user register
Route::get('/logout', 'LoginController@destroy'); // get route register

// route access-denied

Route::get('/access_denied', 'PageController@accessDenied');  //get category with posts





  // //////////// test middleware Route /////////////////
//  ///////////////////////  group admin routes
Route::group(['middleware'=>'roles','roles'=>['admin','manager']], function(){

Route::get('/admin', 'PageController@admin'); // get to admin
Route::get('/add-role', 'PageController@addRole'); // get to admin
	// stop_comments
Route::post('/settings', 'PageController@settings');
	//statistics
Route::get('/statistics', 'PageController@statistics');  //get category with posts
}); 
//  group manager routes
Route::group(['middleware'=>'roles','roles'=>['admin','manager']], function(){

Route::get('/manager', 'PageController@manager'); // get to manager
Route::post('/posts/store', 'PageController@store'); // add post

Route::get('/statistics', 'PageController@statistics');  //get category with posts

}); 
//  group editor routes
Route::group(['middleware'=>'roles','roles'=>['editor','admin','manager']], function(){

Route::get('/editor', 'PageController@editor'); // get to editor
Route::post('/posts/store', 'PageController@store'); // add post

Route::get('/statistics', 'PageController@statistics');  //get category with posts
}); 
//  group user routes
Route::group(['middleware'=>'roles','roles'=>['user']], function(){

// Route::get('/admin', 'PageController@admin'); // get to user
// Route::get('/add-role', 'PageController@addRole'); // get to user

}); 



 // ///////////////////////test routes only///////////////
// Route::get('/admin', [
// 	'uses' 	 	  =>	'PageController@admin',
// 	'as' 		  => 'admin.admin',
// 	'middleware'  => 'roles',
// 	'roles'       => ['admin']
// 	]);

// Route::post('/add-role', [
// 	'uses' 		  =>	'PageController@addRole',
// 	'as' 		  => 'admin.admin',
// 	'middleware'  => 'roles',
// 	'roles'       => ['admin']
// 	]);


// Route::get('/editor', [
// 	'uses' 		  =>	'PageController@editor',
// 	'as' 		  => 'admin.editor',
// 	'middleware'  => 'roles',
// 	'roles'       => ['editor']
// 	]);

	 // 
	 // 