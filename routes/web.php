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

Route::group(['prefix' => 'lk'], static function () {
    Route::get('', [LkController::class, 'index'])->name('lk.index');
    Route::get('create', [LkController::class, 'create'])->name('lk.create');
    Route::post('', [LkController::class, 'store'])->name('lk.store');
    Route::get('{bb}/edit', [LkController::class, 'edit'])->name('lk.edit');
    Route::patch('{bb}', [LkController::class, 'update'])->name('lk.update');
    Route::get('{bb}/delete', [LkController::class, 'delete'])->name('lk.delete');
    Route::delete('{bb}', [LkController::class, 'destroy'])->name('lk.destroy');
});

Route::get('/{bb}',[BbsController::class, 'detail'])->name('bbs.detail');

