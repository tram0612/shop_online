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
Route::pattern('id','([0-9]+)');

Route::get('/', function () {

    return view('frontend.layouts.index');
});


Route::namespace('Frontend')->group(function () {
	Route::get('/', 'ProductController@index')->name('frontend.index');
	Route::get('/{id}', 'ProductController@detail')->name('frontend.detail');
	Route::get('/out', 'FrontendController@logout')->name('frontend.logout');
	Route::get('/signin', 'FrontendController@getLogin')->name('frontend.login');
	Route::post('/signin', 'FrontendController@postLogin')->name('frontend.login');
	Route::get('/signup', 'FrontendController@getRegister')->name('frontend.signup');
	Route::post('/signup', 'FrontendController@postRegister')->name('frontend.signup');
	Route::prefix('blog')->group(function () {
		Route::get('/', 'BlogController@index')->name('frontend.blog');
		Route::get('/{id}', 'BlogController@singleBlog')->name('frontend.blog.single');
	});
	// Route::get('/rate',[
	// 		'uses'=>'RateController@rate',
	// 		'as'=>'frontend.rate',
	// 	]);
	 Route::post('/ajaxRate', 'RateController@rate')->name('frontend.rate');

	Route::post('/addComment', 'CommentController@add')->name('comment.add');
	
	Route::post('/profile', 'UserController@edit')->name('account.edit');
	Route::prefix('account')->group(function () {
		Route::get('/', 'UserController@profile')->name('frontend.account');
		Route::prefix('product')->group(function () {
			Route::get('/', 'ProductController@productUser')->name('frontend.account.product');
			Route::get('/add', 'ProductController@getAdd')->name('frontend.account.product.add');
			Route::post('/add', 'ProductController@postAdd')->name('frontend.account.product.add');
			Route::get('/edit/{id}', 'ProductController@getEdit')->name('frontend.account.product.edit');
			Route::post('/edit/{id}', 'ProductController@postEdit')->name('frontend.account.product.edit');
			Route::get('/del/{id}', 'ProductController@del')->name('frontend.account.product.del');
		});
	});
	Route::prefix('product')->group(function () {
		Route::get('/', 'ProductController@index')->name('frontend.product');
	});
	
	

});

Auth::routes();
Route::namespace('Admin')->group(function () {
	Route::prefix('admin')->group(function () {
		Route::get('/home', 'DashboardController@index')->name('admin.dashboard');
		Route::get('/profile', 'UserController@getProfile')->name('admin.profile');
		Route::post('/profile', 'UserController@postProfile')->name('admin.profile');
		// Route::get('/blog', 'DashboardController@blog')->name('admin.blog');
		Route::get('/user', 'DashboardController@user')->name('admin.user');
		Route::get('/country', 'CountryController@index')->name('admin.country');
		Route::get('/country/add', 'CountryController@getAdd')->name('admin.country.add');
		Route::post('/country/add', 'CountryController@postAdd')->name('admin.country.add');
		Route::prefix('blog')->group(function () {
			Route::get('/', 'BlogController@index')->name('admin.blog');
			Route::get('/add', 'BlogController@getAdd')->name('admin.blog.add');
			Route::post('/add', 'BlogController@postAdd')->name('admin.blog.add');
			Route::get('/edit/{id}', 'BlogController@getEdit')->name('admin.blog.edit');
			Route::post('/edit/{id}', 'BlogController@postEdit')->name('admin.blog.edit');
			Route::get('/del/{id}', 'BlogController@del')->name('admin.blog.del');
		});
	});
});