<?php

use App\Http\Controllers\eventController;
use App\Http\Controllers\timetableController;
use App\Http\Controllers\userController;
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

/*
    NOTES on Rest API:
    1. the first one would be returning all data
    2. second one would get specific data
    3. the third one is for create purposes
    4. the forth one is for update purposes
    5. last one would be for deleting the data
*/

// api for user

    Route::post('/users/{email}', [userController::class, 'check']);  
    Route::get('/users/{id}', [userController::class, 'retrieve']);  
    Route::post('/users', [userController::class, 'register']);
    Route::put('/users/{id}', [userController::class, 'update'])->name('update_profile'); 
    
    //api for timetable
    Route::get('/timetables', [timetableController::class, 'index']);
    Route::get('/timetables/{timetable}', [timetableController::class, 'retrieve']);
    Route::post('/timetables', [timetableController::class, 'create']);
    Route::put('/timetables/{timetable}', [timetableController::class, 'update']);
    Route::delete('/timetables/{timetable}', [timetableController::class, 'delete']);
    
    // api for event
    // check the ID
    Route::get('/events', [eventController::class, 'index']);
    Route::get('/events/{id}', [eventController::class, 'retrieve']);
    Route::post('/events', [eventController::class, 'make']);
    Route::put('/events', [eventController::class, 'update']);
    Route::delete('/events/{id}', [eventController::class, 'delete']);