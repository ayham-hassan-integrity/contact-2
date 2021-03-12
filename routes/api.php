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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});

use App\Domains\Person\Http\Controllers\Api\Person\PersonController;

Route::group([
    'prefix' => 'person',
    'as' => 'person.',
], function () {

    Route::get('/', [PersonController::class, 'index'])->name('index');
    Route::post('/', [PersonController::class, 'store'])->name('store');
    Route::group(['prefix' => '{project}'], function () {
        Route::get('/', [PersonController::class, 'show'])->name('show');
        Route::put('/', [PersonController::class, 'update'])->name('update');
        Route::delete('/', [PersonController::class, 'delete'])->name('destroy');
    });
});
