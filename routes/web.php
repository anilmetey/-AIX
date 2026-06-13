<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('/documents', App\Livewire\DocumentManager::class)->name('documents');
    Route::get('/chat', App\Livewire\Chat::class)->name('chat');
    Route::get('/pricing', App\Livewire\Pricing::class)->name('pricing');
    Route::get('/billing/success', [App\Http\Controllers\BillingController::class, 'success'])->name('billing.success');
});
