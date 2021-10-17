<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\StatuesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\NotficationController;
use App\Http\Controllers\SercodeController;


use App\Http\Controllers\DoctorController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/post/{id}', function(Request $request) {
    return $request->id;
});


///services Api
Route::get('/services',[ServiceController::class,'index'] );
Route::get('/service/{id}/doctors',[ServiceController::class,'show_List'] );
Route::post('/services',[ServiceController::class,'store'] );
Route::put('/services/{id}',[ServiceController::class,'update'] );
Route::delete('/services/{id}',[ServiceController::class,'destroy'] );

///Report Api
Route::get('/reports',[ReportController::class,'index'] );
Route::post('/reports',[ReportController::class,'store'] );
Route::put('/reports/{id}',[ReportController::class,'update'] );
Route::delete('/reports/{id}',[ReportController::class,'destroy'] );

///statues Api
Route::get('/statues',[StatuesController::class,'index'] );
Route::post('/statues',[StatuesController::class,'store'] );
Route::put('/statues/{id}',[StatuesController::class,'update'] );
Route::delete('/statues/{id}',[StatuesController::class,'destroy'] );
///appointment
Route::get('/appointment',[AppointmentController::class,'index'] );
Route::post('/appointment',[AppointmentController::class,'store'] );
Route::put('/appointment/{id}',[AppointmentController::class,'update'] );
Route::delete('/appointment/{id}',[AppointmentController::class,'destroy'] );



///docot
Route::get('/doctor',[DoctorController::class,'index'] );
Route::post('/doctor',[DoctorController::class,'store'] );
Route::put('/doctor/{id}',[DoctorController::class,'update'] );
Route::delete('/doctor/{id}',[DoctorController::class,'destroy']);

///patient statues api
Route::get('/patients',[StatuesController::class,'index'] );
Route::post('/patients',[StatuesController::class,'store'] );
Route::put('/patient/{id}',[StatuesController::class,'update'] );
Route::delete('/patient/{id}',[StatuesController::class,'destroy']);


///search Api
Route::get('/services/search/{name}',[ServiceController::class,'search'] );

//user id 
Route::get('/users',[UserController::class,'index'] );
Route::post('/users',[UserController::class,'store'] );
Route::get('/user/{id}/appointments',[UserController::class,'show'] );

Route::delete('/user/{id}',[UserController::class,'destroy'] );


///Notifcation Api
Route::get('/notifcations',[NotficationController::class,'index'] );
Route::get('/notifcation/user/{id}',[NotficationController::class,'show_List'] );
Route::post('/notifcations',[NotficationController::class,'store'] );
Route::put('/notifcations/{id}',[NotficationController::class,'update'] );
Route::delete('/notifcations/{id}',[NotficationController::class,'destroy'] );
Route::delete('/notifcations',[NotficationController::class,'destroyAll'] );

Route::get('/service/user/{id}',[SercodeController::class,'user_Service'] );



///here we check if the api not exist
Route::get('/{any}',function(Request $request){
  return  error_message();
});
Route::post('/{any}',function(Request $request){
  return  error_message1();
});
Route::put('/{any}',function(Request $request){
  return  error_message2();
});
Route::delete('/{any}',function(Request $request){
  return  error_message3();
});