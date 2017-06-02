<?php

use Illuminate\Http\Request;
use v1\DrugsController;
use v1\BoxesController;
use v1\DcisController;
use v1\CategoriesController;
use v1\BatchesController;

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

Route::resource('/v1/batches', BatchesController::class, [
    'except' => ['create', 'edit']
]);

Route::get('/v1/boxes/{box}/batches', function ($boxId) {
    $data = App\Box::where('id', $boxId)->first();
    return response()->json($data->batches);
});

Route::get('/v1/drugs/{drug}/batches', function ($drugId) {
    $data = App\Drug::where('id', $drugId)->first();
    return response()->json($data->batches);
});

Route::get('/v1/dcis/{dci}/drugs', function ($dciId) {
    $data = App\Dci::where('id', $dciId)->first();
    return response()->json($data->drugs);
});

Route::get('/v1/categories/{category}/drugs', function ($categoryId) {
    $data = App\Category::where('id', $categoryId)->first();
    return response()->json($data->drugs);
});