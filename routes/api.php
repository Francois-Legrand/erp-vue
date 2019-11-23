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
Route::prefix('1.0')->group(function () {

    Route::get('/ping', [
        'uses' => '\App\Http\Controllers\Api\v1a\PingController@ping',
        'as' => 'test.ping'
    ]);
    
    Route::post('/projects/{id}/archive', [
        'uses' => '\App\Http\Controllers\Api\v1a\ProjectController@setArchived',
        'as' => 'projects.archive'
    ]);

    Route::delete('/projects/{projectId}/tasks', [
        'uses' => '\App\Http\Controllers\Api\v1a\TaskController@destroyByProject',
        'as' => 'projects.tasks.destroy_by_project'
    ]);

    // Route::post('/{userId}/contacts', [
    //     'uses' => '\App\Http\Controllers\Api\v1a\ContactController@store',
    //     'as' => 'contacts'
    // ]);

    Route::apiResource('projects', 'Api\v1a\ProjectController');
    // Route::apiResource('contacts', 'Api\v1a\ContactController');
    Route::apiResource('business-developpers', 'Api\v1a\BusinessDevelopperController');
    Route::apiResource('projects/{id}/tasks', 'Api\v1a\TaskController');
    Route::apiResource('business-developpers/{developperId}/deals', 'Api\v1a\DealController');
    Route::apiResource('business-developpers/{developperId}/contacts', 'Api\v1a\ContactController');
    Route::apiResource('business-developpers/{developperId}/deals/{dealId}/actions', 'Api\v1a\ActionController');
});
Route::fallback(function () {
    return response()->json([
        'message' => 'No entry API for this url'
    ], 404);
});
