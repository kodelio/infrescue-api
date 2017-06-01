<?php

use Illuminate\Http\Request;
use v1\DrugsController;
use v1\BoxesController;
use v1\DcisController;
use v1\CategoriesController;

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

Route::resource('/v1/drugs', DrugsController::class, [
    'except' => ['create', 'edit']
]);
// api/v1/drugs

Route::resource('/v1/boxes', BoxesController::class, [
    'except' => ['create', 'edit']
]);

Route::resource('/v1/dcis', DcisController::class, [
    'except' => ['create', 'edit']
]);

Route::resource('/v1/categories', CategoriesController::class, [
    'except' => ['create', 'edit']
]);