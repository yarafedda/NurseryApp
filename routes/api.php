<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\ChildController;
use App\Http\Controllers\API\GuardianController;
use App\Http\Controllers\API\ProgramController;
use App\Http\Controllers\API\StaffController;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ContactController;


Route::get('/children',[ChildController::class,'index']);
Route::post('/children',[ChildController::class,'store']);

Route::post('/guardians',[GuardianController::class,'store']);
Route::get('/guardians',[GuardianController::class,'index']);


Route::middleware('auth:sanctum')->post('/programs',[ProgramController::class,'store']);
Route::get('/programs',[ProgramController::class,'index']);

Route::middleware('auth:sanctum')->post('/staffs',[StaffController::class,'store']);
Route::get('/staffs',[StaffController::class,'index']);

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login',[AuthController::class,'login']);


Route::middleware('auth:sanctum')->post('/logout', [AuthController::class, 'logout']);
Route::post('/contact',[ContactController::class,'sendMail']);




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/


