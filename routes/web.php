<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\PreviousWorkController;

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
    Route::resource('works', App\Http\Controllers\PreviousWorkController::class);
    Route::resource('users', App\Http\Controllers\UserController::class) ;
    Route::resource('admin-blogs', App\Http\Controllers\BlogController::class);
    Route::get('admin-galleries', [ App\Http\Controllers\GalleryController::class, 'index'])->name('admin-galleries.index');
    Route::post('user-profile-image/{user}', [ App\Http\Controllers\UserController::class, 'userProfileImage'])->name('user-profile-image');
    
    Route::get('messages/{contactId}', [ContactController::class,'show'])->name('messages.show');
    Route::get('messages', [ContactController::class,'index'])->name('messages.index');
    Route::post('messages/delete', [ContactController::class,'destroy'])->name('messages.destroy');

    Route::post('messages/mark-all-as-read', [ContactController::class,'markAllAsRead'])->name('mark-all-as-read');
    

});

Route::get('/',[PageController::class,'index'])->name('index');


Route::get('/',[PageController::class,'index'])->name('page.index');
Route::get ('/about', [PageController::class,'about'])->name('about');
Route::get('/projects', [PageController::class,'projects'])->name('projects');
Route::get('/contact-us', [PageController::class,'contact'])->name('contact');
Route::get('/programs', [PageController::class,'programs'])->name('programs');
Route::get('/program/{id}', [PageController::class,'program'])->name('program');
Route::get('/previous-work', [PageController::class,'works'])->name('works');
Route::get('/previous-work/{id}', [PageController::class,'work'])->name('work');
Route::get('/who-we-are', [PageController::class,'whoweare'])->name('whoweare');
Route::get('gallery',[PageController::class,'gallery'])->name('gallery');
Route::post('contacts', [ContactController::class,'store'])->name('contacts.store');
