<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', App\Livewire\Home::class)->name('home');
Route::get('/about', App\Livewire\About::class)->name('about');
Route::get('/contact', App\Livewire\Contact::class)->name('contact');
Route::get('/login', App\Livewire\Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
    Route::get('/blog', App\Livewire\Blog::class)->name('blog');
    Route::post('/logout', function () {
        Auth::logout();

        return to_route('home');
    })->name('logout');
});
