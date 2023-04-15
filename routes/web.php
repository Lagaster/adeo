<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;

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
//     return view('welcome');
// });

Auth::routes();


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('programs', App\Http\Controllers\ProgramController::class);
    Route::resource('users', App\Http\Controllers\UserController::class) ;
});
Route::get('/',[PageController::class,'index'])->name('home');
Route::get ('/about', [PageController::class,'about'])->name('about');
Route::get('/projects', [PageController::class,'projects'])->name('projects');
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::get('/blogs', [PageController::class,'blogs'])->name('blogs');
Route::get('/whoweare', [PageController::class,'whoweare'])->name('whoweare');
Route::resource('/contacts', ContactController::class);
