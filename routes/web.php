<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [CategoriesController::class, 'index']);
Route::get('sub_category/{id}', [CategoriesController::class, 'showSubCategory']);
Route::get('sub_of_sub_category/{id}', [CategoriesController::class, 'showSubOfSubCategory']);

