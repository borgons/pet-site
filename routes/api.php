<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PetsController;
use App\Http\Controllers\Api\OwnersController;
use App\Http\Controllers\Api\ProfileController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\Auth\AdminController;
use App\Http\Controllers\Api\VaccinatesController;
use App\Http\Controllers\Api\AppointmentsController;


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

Route::middleware('cors')->group(function(){

    //AUTH
    Route::post('/register', [AdminController::class, 'register']); 
    Route::post('/login', [AdminController::class, 'login']); 

    // OWNERS
    Route::get('/owners', [OwnersController::class, 'index']);
    Route::post('/owner', [OwnersController::class, 'store']);
    Route::get('/owner/{id}', [OwnersController::class, 'show']);
    Route::put('/owner/{id}',[OwnersController::class, 'update']);
    Route::delete('/owner/{id}',[OwnersController::class, 'destroy']);

    // PET
    Route::get('/pets', [PetsController::class, 'index']);
    Route::get('/pet/{id}', [PetsController::class, 'show']);
    Route::put('/pet/{id}',[PetsController::class, 'update']);
    Route::delete('/pet/{id}',[PetsController::class, 'destroy']);
    Route::post('/petRegister', [RegisterController::class, 'store']);
    
    // VACCINATE 
    Route::get('/vaccinates', [VaccinatesController::class, 'index']);
    Route::post('/vaccinate', [VaccinatesController::class, 'store']);
    Route::get('/vaccinate/{id}', [VaccinatesController::class, 'show']);
    //Route::get('/vaccinate/srchPetID/{petID}', [VaccinatesController::class, 'search']);
    Route::put('/vaccinate/{petID}',[VaccinatesController::class, 'update']);
    Route::delete('/vaccinate/{id}',[VaccinatesController::class, 'destroy']);

    // VACCINATION PROFILE
    Route::get('/vacProfile', [ProfileController::class, 'index']);
    Route::get('/vacProfile/{vacOwnerID}', [ProfileController::class, 'srchOwnerID']);

    // APPOINTMENTS 
    Route::get('/appointments', [AppointmentsController::class, 'index']);
    Route::post('/newAppoint', [AppointmentsController::class, 'store']);
    Route::get('/appointment/{id}', [AppointmentsController::class, 'show']);
    Route::get('/appointment/srchPetID/{appPetID}', [AppointmentsController::class, 'search']); 
    Route::put('/appointment/{id}',[AppointmentsController::class, 'update']);
    Route::delete('/appointment/{id}',[AppointmentsController::class, 'destroy']);

    // AUTH LOGGING OUT
    Route::post('/logout', [AdminController::class, 'logout']);

}); 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
