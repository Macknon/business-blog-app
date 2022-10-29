<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\CategoryController;
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

//add taking precedence of slug route to prevent 404
Route::get('/news/add', [BizNewsController::class, 'create'])->name('news.create');
/*
alternative auth::
Route::get('/news/add', [BizNewsController::class, 'create'])->name('news.create')->middleware('auth');
*/
Route::get('/news/{newsItem:slug}', [BizNewsController::class, 'show'])->name('news.show');

Route::get('/news/{newsItem}/edit', [BizNewsController::class, 'edit'])->name('news.edit');
 
Route::put('/news/{newsItem}', [BizNewsController::class, 'update'])->name('news.update');

Route::delete('/news/{newsItem}', [BizNewsController::class, 'destroy'])->name('news.destroy');

Route::post('/news', [BizNewsController::class, 'store'])->name('news.store');

Route::get('/about', function () { return view('about'); })->name('about');

Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

# Categories Resource
Route::resource('/categories', CategoryController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
