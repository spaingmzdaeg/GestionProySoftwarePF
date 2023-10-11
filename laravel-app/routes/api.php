<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CategoryController;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Remember that routes declared in api.php will automatically prepend the /api prefix, api/admin/categories without public

Route::get('/admin/categories', [CategoryController::class, 'IndexApi']);

// Route::group(['prefix' => 'v1','namespace' => 'App\Http\Controllers'], function() {
//     Route::apiResource('allcategoryapi' , CategoryController::class);
//     // Route::apiResource('subcategories' , SubCategoryController::class);
// });