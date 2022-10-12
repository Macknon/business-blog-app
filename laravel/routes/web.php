<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\BizNewsController;
use App\Http\Controllers\ContactController;
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



Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::get('/news', [BizNewsController::class, 'index'])->name('news.index');

Route::get('/news/selected-news', [BizNewsController::class, 'show'])->name('news.show');

Route::get('/about', function () { return view('about'); })->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');