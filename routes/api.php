<?php

use App\Http\Controllers\API\LetterCategoryController;
use App\Http\Controllers\API\LetterController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\UserController;
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

Route::get('users', [UserController::class, 'index']);
Route::get('users/{id}', [UserController::class, 'show']);
Route::post('users', [UserController::class, 'store']);
Route::put('users/{id}', [UserController::class, 'update']);
Route::delete('users/{id}', [UserController::class, 'destroy']);

Route::get('roles', [RoleController::class, 'index']);
Route::get('roles/{id}', [RoleController::class, 'show']);
Route::post('roles', [RoleController::class, 'store']);
Route::put('roles/{id}', [RoleController::class, 'update']);
Route::delete('roles/{id}', [RoleController::class, 'destroy']);


Route::get('letters', [LetterController::class, 'index']);
Route::get('letters/{id}', [LetterController::class, 'show']);
Route::post('letters', [LetterController::class, 'store']);
Route::put('letters/{id}', [LetterController::class, 'update']);
Route::delete('letters/{id}', [LetterController::class, 'destroy']);


Route::get('letter-categories', [LetterCategoryController::class, 'index']);
Route::get('letter-categories/{id}', [LetterCategoryController::class, 'show']);
Route::post('letter-categories', [LetterCategoryController::class, 'store']);
Route::put('letter-categories/{id}', [LetterCategoryController::class, 'update']);
Route::delete('letter-categories/{id}', [LetterCategoryController::class, 'destroy']);
