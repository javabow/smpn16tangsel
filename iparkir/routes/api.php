<?php

use Illuminate\Http\Request;

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
Route::get('/tenants-promo', 'Api\PromosiTenantsController@index');
Route::get('/tenants', 'Api\TenantsController@index');
// Route::get('/tenants-promo/{select?}/{where?}/{orderBy?}/{limit?}/{offset?}', 'Api\PromosiTenantsController@get');
