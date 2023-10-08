<?php

use App\Http\Controllers\BbsController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LkController;

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

Route::get('/',[BbsController::class, 'index'])->name('bbs.index');
Auth::routes();

Route::get('/lk', [LkController::class, 'index'])->name('lk.index');
Route::get('/{bb}',[BbsController::class, 'detail'])->name('bbs.detail');
