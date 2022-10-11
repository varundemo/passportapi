<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\FileController;
use App\Models\Employee;
use GuzzleHttp\Cookie\FileCookieJar;
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

Route::get('/', function () {
    // return view('welcome');
    dd("no welcome");
});

// Route::post('register',[AuthController::class,'register']);


Route::get('file',[FileController::class, 'index'])->name('file');
Route::post('store-file',[FileController::class, 'store']);

Route::get('get-data', [EmployeeController::class, 'data']);



