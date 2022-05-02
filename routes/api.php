<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\StudentClassController;
use App\Http\Controllers\Api\StudentSubjectController;
use App\Http\Controllers\Api\StudentSectionController;
use App\Http\Controllers\Api\StudentController;

use App\Http\Controllers\AuthController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::apiResources([
    '/student-class' => StudentClassController::class,
    '/student-subject' => StudentSubjectController::class,
    '/student-section' => StudentSectionController::class,
    '/student' => StudentController::class,
]);

Route::group([

    // 'middleware' => 'api',
    'prefix' => 'auth'

    // ], function ($router) {
], function () {

    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);
    Route::post('register', [AuthController::class, 'register']);
});
