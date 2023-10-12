<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/about', App\Livewire\About::class)->name('about');
Route::get('/contact', App\Livewire\Contact::class)->name('contact');
Route::get('/login', App\Livewire\Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
	Route::get('/', App\Livewire\Home::class)->name('home');
	Route::get('/non-kontrak', App\Livewire\NonKontrakIndex::class)->name('non_kontrak_index');
	Route::get('/kontrak', App\Livewire\KontrakIndex::class)->name('kontrak_index');
	Route::get('/report', App\Livewire\ReportIndex::class)->name('report_index');


    Route::post('/logout', function () {
        Auth::logout();

        return to_route('home');
    })->name('logout');

    Route::get('/post', App\Livewire\PostIndex::class)->name('post');
    Route::get('/post/detail/{id}', App\Livewire\BlogOpenDetail::class)->name('blog_open_detail');

    Route::get('/list', App\Livewire\ListData::class)->name('list');

    Route::prefix('proposal')->group(function () {
        Route::get('/', App\Livewire\ProposalList::class)->name('proposal');
        Route::get('/create', App\Livewire\ProposalCreate::class)->name('proposal_create');
        Route::get('/bypass-date', App\Livewire\ProposalBypass::class)->name('proposal_bypass_date');
        Route::get('/report', App\Livewire\ProposalReport::class)->name('proposal_report');
        Route::get('/all', App\Livewire\ProposalListAll::class)->name('proposal_all');
    });

    Route::get('/list', App\Livewire\ListData::class)->name('list');
});
