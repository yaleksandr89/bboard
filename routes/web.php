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
    Route::get('', [LkController::class, 'index'])
        ->name('lk.index');
    Route::get('create', [LkController::class, 'create'])
        ->name('lk.create');
    Route::post('', [LkController::class, 'store'])
        ->name('lk.store');
    Route::get('{bb}/edit', [LkController::class, 'edit'])
        ->name('lk.edit')
        ->middleware('can:update,bb');
    Route::patch('{bb}', [LkController::class, 'update'])
        ->name('lk.update')
        ->middleware('can:update,bb');
    Route::get('{bb}/delete', [LkController::class, 'delete'])
        ->name('lk.delete')
        ->middleware('can:destroy,bb');
    Route::delete('{bb}', [LkController::class, 'destroy'])
        ->name('lk.destroy')
        ->middleware('can:destroy,bb');
    Route::get('{id}/restore', [LkController::class, 'deleted'])
        ->name('lk.trash');
    Route::post('{id}/restore', [LkController::class, 'restore'])
        ->name('lk.restore');
});

Route::get('/{bb}',[BbsController::class, 'detail'])->name('bbs.detail');

