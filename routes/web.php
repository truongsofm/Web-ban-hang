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

Auth::routes();
Route::get('/', function () {
    return view('welcome');
});
Route::get('test', function () {
    echo "xin chao";
});

Route::get('product-type/{type}',[
	'as'=>'ProductType',
	'uses'=>'PageController@getProductType'
]);

Route::get('product-detail/{type}/{name}',[
	'as'=>'ProductDetail',
	'uses'=>'PageController@getProductDetail'
]);

Route::get('contact',[
	'as'=>'Contact',
	'uses'=>'PageController@getContact'
]);

Route::get('about',[
	'as'=>'About',
	'uses'=>'PageController@getAbout'
]);

Route::get('add-to-cart/{id}/{qty}',[
	'as'=>'AddToCart',
	'uses'=>'PageController@getAddToCart'
]);

Route::post('add-multi-to-cart/{id}',[
	'as'=>'AddMultiToCart',
	'uses'=>'PageController@postAddMultiToCart'
]);

Route::get('remove-item/{id}',[
	'as'=>'RemoveItem',
	'uses'=>'PageController@getRemoveItem'
]);

Route::get('bill',[
	'as'=>'Bill',
	'uses'=>'PageController@getBill'
]);
Route::post('checkout',[
	'as'=>'CheckOut',
	'uses'=>'PageController@postCheckOut'
]);

Route::get('loginpage',[
	'as'=>'LoginPage',
	'uses'=>'PageController@getLoginPage'
]);

Route::get('signup',[
	'as'=>'Signup',
	'uses'=>'PageController@getSignup'
]);
/*
Route::post('postlogin',[
	'as'=>'postLogin',
	'uses'=>'PageController@postLogin'
]);
*/
Route::post('postsignup',[
	'as'=>'postSignup',
	'uses'=>'PageController@postSignup'
]);

Route::get('search',[
	'as'=>'Search',
	'uses'=>'PageController@getSearch'
]);



Auth::routes();

Route::get('home',[
	'as'=>'HomePage',
	'uses'=>'PageController@getHomePage'
]);