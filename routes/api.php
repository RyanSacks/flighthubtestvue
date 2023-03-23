<?php

use App\Http\Controllers\ListController;
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

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(["prefix" => "v1"], function() {
    // List Items
    Route::get('user/list/people', [ListController::class, 'listPeople']);
    Route::get('user/list/planets', [ListController::class, 'listPlanets']);
    Route::get('user/list/starships', [ListController::class, 'listStarships']);
    Route::get('user/list/people/{search}', [ListController::class, 'searchPerson']);
});
