<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/status/{id}','App\Http\Controllers\OrderController@changeStatus');

Route::post('/new-order','App\Http\Controllers\OrderController@addOrder');

Route::get('/delete-order/{id}','App\Http\Controllers\OrderController@deleteOrder');

Route::get('/all-orders', 'App\Http\Controllers\OrderController@getAllOrders');

Route::post('/add-completed-work','App\Http\Controllers\WorkController@addWork');

Route::get('/get-completed-works/{count}','App\Http\Controllers\WorkController@getWorks');

Route::get('/one-work/{id}','App\Http\Controllers\WorkController@getOneWork');

Route::get('/remove-work/{id}','App\Http\Controllers\WorkController@removeWork');

Route::post('/update-work', 'App\Http\Controllers\WorkController@removeWork');

Route::get('/auth','App\Http\Controllers\AuthController@auth');

Route::get('/out', 'App\Http\Controllers\AuthController@out');

Route::post('/register', 'App\Http\Controllers\AuthController@register');

Route::post('/login', 'App\Http\Controllers\AuthController@login');

Route::post('/new-appeal', 'App\Http\Controllers\AppealController@newAppeal');

Route::post('/add-slide', 'App\Http\Controllers\SliderController@newSlide');

Route::get('/all-slides', 'App\Http\Controllers\SliderController@getAllSlides');

Route::get('/get-all-appeals', 'App\Http\Controllers\AppealController@getAppeals');

Route::get('/appeal-status/{id}', 'App\Http\Controllers\AppealController@appealStatusChange');

Route::post('/confirm', 'App\Http\Controllers\mailController@send');

Route::post('/mail-appeal', 'App\Http\Controllers\AppealController@mail');

Route::get('/del-slide/{id}','App\Http\Controllers\SliderController@deleteSlide');