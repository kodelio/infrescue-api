<?php

use Illuminate\Http\Request;
use v1\DrugsController;
use v1\BoxesController;
use v1\DcisController;
use v1\CategoriesController;
use v1\BatchesController;
use v1\OrdersController;

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

Route::resource('/v1/orders', OrdersController::class, [
    'except' => ['create', 'edit', 'update', 'destroy']
]);

Route::get('/v1/boxes/{box}/batches', function ($boxId) {
    $data = App\Box::where('id', $boxId)->first();
    return response()->json($data->batches, 200);
});

Route::get('/v1/drugs/{drug}/batches', function ($drugId) {
    $data = App\Drug::where('id', $drugId)->first();
    return response()->json($data->batches, 200);
});

Route::get('/v1/dcis/{dci}/drugs', function ($dciId) {
    $data = App\Dci::where('id', $dciId)->first();
    return response()->json($data->drugs, 200);
});

Route::get('/v1/categories/{category}/drugs', function ($categoryId) {
    $data = App\Category::where('id', $categoryId)->first();
    return response()->json($data->drugs, 200);
});

Route::post('/v1/users/login', function () {
    try {
        $data = App\User::where('email', request()->input('email'))->firstOrFail();
        if (Hash::check(request()->input('password'), $data['password'])) {
            return response()->json($data, 201);
        }
        else {
            return response()->json(['message' => 'Wrong password'], 401);
        }
    }
    catch (Exception $e) {
        return response()->json(['message' => $e->getMessage()], 500);
    }
});
