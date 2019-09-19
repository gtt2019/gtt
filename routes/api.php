<?php
use Illuminate\Http\Request;

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/authUser', 'Login\LoginController@authUser');

Route::post('/getAllNewTask', 'Task\TaskController@getAllNewTask');
Route::post('/getPendingTask', 'Task\TaskController@getPendingTask');
Route::post('/updateOrderStatus', 'Task\TaskController@updateOrderStatus');

//DAshborad API
Route::post('/getCompletedOrderCount', 'Task\TaskController@getCompletedOrderCount');
Route::post('/getTotalEarnings', 'Task\TaskController@getTotalEarnings');

Route::post('/confirmOrder', 'Task\TaskController@confirmOrder');
Route::post('/rejectOrder', 'Task\TaskController@rejectOrder');
Route::post('/getOrderDetails', 'Task\TaskController@getOrderDetails');
Route::post('/verifyHappyCode', 'Task\TaskController@verifyHappyCode');
Route::post('/saveFeedback', 'Task\TaskController@submitFeedBackForOrder');
Route::post('/getCompletedOrderHistory', 'Task\TaskController@getCompletedOrderHistory');

Route::post('/uploadBillImages', 'File\FileController@uploadBillImages');
Route::post('/uploadOrderImages', 'File\FileController@uploadOrderImages');

Route::post('/updateUserLocation', 'User\UserController@updateUserLocation');

Route::post('/sendOtpToUSer', 'ThirdPartyService\ThirdPartyApiController@sendOtpToUSer');
Route::post('/verifyOtp', 'ThirdPartyService\ThirdPartyApiController@verifyOtp');

// Route::get('/getRoles', 
// [
//     'middleware' => 'api',
//     'uses' => 'Role\RoleController@getRoles'
//  ]);