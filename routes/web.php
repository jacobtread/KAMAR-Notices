<?php

use App\Http\Controllers\NoticesController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/{date?}', [NoticesController::class, 'render']);
Route::get('/{date?}/embed', [NoticesController::class, 'render_embed']);
