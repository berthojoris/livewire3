<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/login', App\Livewire\Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
	Route::post('/logout', function () {
        Auth::logout();

        return to_route('home');
    })->name('logout');


	Route::get('/', App\Livewire\Home::class)->name('home');

	Route::prefix('non-krontrak')->group(function () {
		Route::get('/', App\Livewire\NonKontrakIndex::class)->name('non_kontrak_index');
		Route::get('/detail/{uuid}', App\Livewire\NonKontrakDetail::class)->name('non_kontrak_detail');
	});

	Route::prefix('kontrak')->group(function () {
		Route::get('/', App\Livewire\KontrakIndex::class)->name('kontrak_index');
		Route::get('/detail/{uuid}', App\Livewire\NonKontrakDetail::class)->name('kontrak_detail');
	});

	Route::get('/report', App\Livewire\ReportIndex::class)->name('report_index');
	Route::get('/user', App\Livewire\UserIndex::class)->name('user_index');
});
