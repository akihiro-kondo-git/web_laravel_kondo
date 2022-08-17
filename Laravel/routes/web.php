<?php

use App\Http\Controllers\MenuController;
use App\Http\Controllers\RegistEmployeeController;
use App\Http\Controllers\ListEmployeeController;
use App\Http\Controllers\ResultRegistController;
use App\Http\Controllers\ReferEmployeeController;
use Illuminate\Support\Facades\Route;



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

//learn: Routeのgetメソッドは第１引数にURL・第２引数に行う処理
Route::get('/', function () {
    return view('welcome');
});

//learn: 「名前付きルーティング処理」nameメソッドでルートに名前を付けることができる
//learn: Laravel8以降では「MenuContoller@index」から下記の書き方に変更されている
//explain: /menuというURLにアクセスされた時、MenuControllerクラスのindexメソッドが呼び出される
Route::get('/menu', [MenuController::class, 'index'])->name('menu');
Route::get('/regist-employee', [RegistEmployeeController::class, 'index'])->name('regist-employee');
Route::get('/list-employee', [ListEmployeeController::class, 'index'])->name('list-employee');
Route::get('/result-regist', [ResultRegistController::class, 'index'])->name('result-regist');
Route::get('/refer-employee', [ReferEmployeeController::class, 'index'])->name('refer-employee');

