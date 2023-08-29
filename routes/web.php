<?php

use Illuminate\Support\Facades\Auth;
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
Route::get('/', App\Livewire\Home::class)->name('home');
Route::get('/about', App\Livewire\About::class)->name('about');
Route::get('/contact', App\Livewire\Contact::class)->name('contact');
Route::get('/login', App\Livewire\Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/blog', App\Livewire\Blog::class)->name('blog');
    Route::post('/logout', function () {
        Auth::logout();

        return redirect('/');
    })->name('logout');
});
