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

// Route::post('/authUser', 'ProductController@authUser');
// Route::get('/authUser', 'Role\RoleController@authUser');
Route::post('/authUser', 'Login\LoginController@authUser');

Route::post('/getAllNewTask', 'Task\TaskController@getAllNewTask');
Route::post('/updateOrderStatus', 'Task\TaskController@updateOrderStatus');

//DAshborad API
Route::post('/getCompletedOrderCount', 'Task\TaskController@getCompletedOrderCount');
Route::post('/getTotalEarnings', 'Task\TaskController@getTotalEarnings');

Route::post('/confirmOrder', 'Task\TaskController@confirmOrder');

// Route::get('/getRoles', 
// [
//     'middleware' => 'api',
//     'uses' => 'Role\RoleController@getRoles'
//  ]);