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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/calculator', 'API\CalculatorController@index');
Route::get('/product-categories', 'API\ProductCategoryController@index');
Route::get('/package-by-product/{product_id}', 'API\PackageController@packageByProduct');
Route::get('/promos', 'API\PromoController@index');

Route::post('/send-estimation', 'API\CalculatorController@sendEstimation');
Route::post('/feedback/store', 'API\FeedbackController@store')->name('api.feedback.store');