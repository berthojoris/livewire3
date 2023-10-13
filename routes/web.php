<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Route::get('/about', App\Livewire\About::class)->name('about');
Route::get('/contact', App\Livewire\Contact::class)->name('contact');
Route::get('/login', App\Livewire\Login::class)->name('login');

Route::middleware(['auth'])->group(function () {
	Route::get('/', App\Livewire\Home::class)->name('home');

	Route::get('/kontrak', App\Livewire\KontrakIndex::class)->name('kontrak_index');
	Route::get('/report', App\Livewire\ReportIndex::class)->name('report_index');

	Route::prefix('non-krontrak')->group(function () {
		Route::get('/', App\Livewire\NonKontrakIndex::class)->name('non_kontrak_index');
		Route::get('/detail/{uuid}', App\Livewire\NonKontrakDetail::class)->name('non_kontrak_detail');

		// Route::get('/create', [App\Http\Controllers\AkuisisiController::class, 'create'])->name('create_akuisisi');
		// Route::post('/store', [App\Http\Controllers\AkuisisiController::class, 'store'])->name('store_akuisisi');
		// Route::get('/validasi/{uuid}', [App\Http\Controllers\AkuisisiController::class, 'validasiAkuisisi'])->name('validasi_akuisisi');
		// Route::match(['post', 'put'], '/update/{uuid}', [App\Http\Controllers\AkuisisiController::class, 'updateAkuisisi'])->name('update_akuisisi');
		// Route::get('/download/akuisisi-detail/{filename}', [App\Http\Controllers\AkuisisiController::class, 'downloadFileAkuisisiDetail'])->name('download_akuisisi_detail');
		// Route::get('/download/attachment/{filename}', [App\Http\Controllers\AkuisisiController::class, 'downloadFileAkuisisiAttachment'])->name('update_akuisisi_attachment');
		// Route::post('/update-attachment/{uuid}', [App\Http\Controllers\AkuisisiController::class, 'updateAttachment'])->name('update_attachment_akuisisi');
		// Route::post('/update/akuisisi/{uuid}', [App\Http\Controllers\AkuisisiController::class, 'updateMasterAkuisisi'])->name('update_master_akuisisi');
		// Route::get('/waiting/{uuid}', [App\Http\Controllers\AkuisisiController::class, 'waitingApproval'])->name('waiting_approval');
	});

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
