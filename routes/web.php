<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Docs\ApiController;
use App\Http\Controllers\Docs\BuilderJsController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::get('/', [BuilderJsController::class, 'index']);
Route::get('docs/api/lookup', [ApiController::class, 'lookup']);
Route::post('docs/api/save-theme', [ApiController::class, 'saveTheme']);
Route::post('docs/api/save-lang', [ApiController::class, 'saveLang']);
