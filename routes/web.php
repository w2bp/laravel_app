<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HelloController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\Sample\SampleController;
use App\Http\Controllers\FileAccessController;
use App\Http\Middleware\HelloMiddleware;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/hello', [HelloController::class, 'index', ['id' => -1]])->name('hello');
Route::get('/hello/{id}', [HelloController::class, 'index'])->where('id', '[0-9]+');
Route::get('/hello/other', [HelloController::class, 'other']);

Route::middleware([HelloMiddleware::class])->group(function (){
    Route::get('/hello/hello', [HelloController::class, 'hello']);
    Route::get('/hello/bye', [HelloController::class, 'bye']);
});

Route::get('/person/{person}', [PersonController::class, 'index']);

Route::get('/sample', [SampleController::class, 'index']);
Route::get('/sample/other', [SampleController::class, 'other']);

Route::get('/file', [FileAccessController::class, 'index'])->name('fileaccess');
Route::get('/file/other/{msg}', [FileAccessController::class, 'other']);