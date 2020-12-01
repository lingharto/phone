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

Route::prefix('phone')->group(function () {
    Route::post('index', 'PhoneController@index')
        ->name('phone.index');
    Route::post('create', 'PhoneController@create')
        ->name('phone.create');
    Route::get('delete/{id}', 'PhoneController@delete')
        ->name('phone.delete');
});

Route::prefix('phoneOffer')->group(function () {
    Route::post('create', 'PhoneOfferController@create')
        ->name('phoneOffer.create');
});
