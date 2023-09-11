<?php

use App\Http\Controllers\FileUploadController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProductController;
use Illuminate\Http\Request;
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

// Route::get('/', function () {
//   return view('welcome');
// });


Route::prefix('auth')->group(function () {
  Route::get('/login', function () {
    return view('login');
  });
  Route::post('/login', [HomeController::class, 'loginAPI']);
  Route::get('/register', function () {
    return view('register');
  });
  Route::post('/register', [HomeController::class, 'register']);
});

Route::post('/logout', [HomeController::class, 'logout'])->name('route-logout');

Route::prefix('file')->group(function () {
  Route::get('/', [FileUploadController::class, 'index']);
  Route::post('/', [FileUploadController::class, 'create']);
  Route::post('/delete/{id}', [FileUploadController::class, 'delete']);
});
