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

Auth::routes([
    'register'=> false,
]);


Route::middleware(['auth'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('programs', App\Http\Controllers\ProgramController::class);
    Route::resource('users', App\Http\Controllers\UserController::class) ;
    Route::resource('admin-blogs', App\Http\Controllers\BlogController::class);
    Route::get('admin-galleries', [ App\Http\Controllers\GalleryController::class, 'index'])->name('admin-galleries.index');
    Route::post('user-profile-image/{user}', [ App\Http\Controllers\UserController::class, 'userProfileImage'])->name('user-profile-image');
});

Route::get('/',[PageController::class,'index'])->name('index');


Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get ('/about', [PageController::class,'about'])->name('about');
Route::get('/projects', [PageController::class,'projects'])->name('projects');
Route::get('/contact', [PageController::class,'contact'])->name('contact');
Route::get('/programs', [PageController::class,'programs'])->name('programs');
Route::get('/program/{id}', [PageController::class,'program'])->name('program');
Route::get('/whoweare', [PageController::class,'whoweare'])->name('whoweare');
Route::get('gallery',[PageController::class,'gallery'])->name('gallery');
Route::resource('/contacts', ContactController::class);
