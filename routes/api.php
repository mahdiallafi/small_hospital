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
use App\Http\Controllers\AuthController;


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


Route::middleware('auth:sanctum')->get("/user",function(Request $request){
  return $request->user();
});
Route::middleware('auth:sanctum')->get("/authenticated",function(){
  return true;
});


 Route::post('/logout',[AuthController::class,'logout'] )->middleware('auth:sanctum');


Route::middleware('auth:sanctum')->get("/refresh", [AuthController::class, 'refresh']);

Route::get('/post/{id}', function(Request $request) {
    return $request->id;
});
///group of functions belognTo admin
Route::group(['middleware'=>['auth:sanctum','role:admin']],function(){
  /// service 
  Route::post('/services',[ServiceController::class,'store'] );
  Route::put('/services/{id}',[ServiceController::class,'update'] );
  Route::delete('/services/{id}',[ServiceController::class,'destroy'] );
  ///list of users 
  Route::get('/users',[UserController::class,'index'] );
  ///list of doctors
  Route::get('/doctor',[DoctorController::class,'index'] );
  //list of doctor belongto service 
  Route::get('/reports',[ReportController::class,'index'] );
  ///notifcations
  Route::get('/notifcations',[NotficationController::class,'index'] );
  Route::post('/notifcations',[NotficationController::class,'store'] );
  Route::put('/notifcations/{id}',[NotficationController::class,'update'] );
  //liat of appointment
  Route::get('/appointment',[AppointmentController::class,'index'] );
});

///group of functions belognTo docto
Route::group(['middleware'=>['auth:sanctum','role:doctor']],function(){
  
///docot
 Route::get('/doctor/{id}',[DoctorController::class,'show'] );
 Route::post('/doctor',[DoctorController::class,'store'] );
 Route::put('/doctor/{id}',[DoctorController::class,'update'] );
 Route::delete('/doctor/{id}',[DoctorController::class,'destroy']);   
///statues Api
 Route::get('/statues',[StatuesController::class,'index'] );
 Route::get('/statues/{id}',[StatuesController::class,'show'] );
 Route::post('/statues',[StatuesController::class,'store'] );
 Route::put('/statues/{id}',[StatuesController::class,'update'] );
 Route::delete('/statues/{id}',[StatuesController::class,'destroy'] );  
///patient statues api
 Route::get('/patients',[StatuesController::class,'index'] );
 Route::get('/patient/{id}',[StatuesController::class,'show'] );
 Route::post('/patients',[StatuesController::class,'store'] );
 Route::put('/patient/{id}',[StatuesController::class,'update'] );
 Route::delete('/patient/{id}',[StatuesController::class,'destroy']);

///doctor see his appointment 


});

///group of functions belongTo  user
Route::group(['middleware' => ['auth:sanctum', 'role:user']], function() { 
 ///Report Api

 Route::post('/reports',[ReportController::class,'store'] );
 Route::post('/report/{id}',[ReportController::class,'show'] );
 Route::put('/reports/{id}',[ReportController::class,'update'] );
 Route::delete('/reports/{id}',[ReportController::class,'destroy'] );
///appointment

 Route::get('/appointment/{id}',[AppointmentController::class,'show'] );
 Route::post('/appointment',[AppointmentController::class,'store'] );
 Route::get('/email',[ServiceController::class,'send'] );
 Route::put('/appointment/{id}',[AppointmentController::class,'update'] );
 Route::delete('/appointment/{id}',[AppointmentController::class,'destroy'] );
//user id 



 Route::get('/user/{id}/appointments',[UserController::class,'show'] );

 ///Notifcation Api
 Route::get('/notifcation/{id}',[NotficationController::class,'show'] );
 Route::get('/notifcation/user/{id}',[NotficationController::class,'show_List'] );
 Route::delete('/notifcations/{id}',[NotficationController::class,'destroy'] );
 Route::delete('/notifcations',[NotficationController::class,'destroyAll'] );
});

////commmon between user and doctor
Route::group(['middleware'=>['auth:sanctum','role:user|doctor|admin']],function(){
  Route::get('/users/{id}',[UserController::class,'showuser'] );
  Route::post('/users',[UserController::class,'store'] );
  Route::put('/users/{id}',[UserController::class,'update'] );
  Route::delete('/user/{id}',[UserController::class,'destroy'] );
});


Route::get('/doctor/{id}/services',[DoctorController::class,'item'] );
///services Api
Route::get('/services',[ServiceController::class,'index']);
Route::get('/service/{id}',[ServiceController::class,'show'] );
Route::get('/service/{id}/doctors',[ServiceController::class,'show_List'] );
Route::get('/doctor/appointments/{id}',[DoctorController::class,'items'] );

///search Api
Route::get('/services/search/{name}',[ServiceController::class,'search'] );

///register
Route::post('/register',[AuthController::class,'register'] );
Route::post('/login', [AuthController::class, 'login']);




/* Route::get('/service/user/{id}',[SercodeController::class,'user_Service'] ); */



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
