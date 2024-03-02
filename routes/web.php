<?php

use App\Livewire\Admin\Genres;
use App\Livewire\Admin\Records;
use App\Livewire\Admin\UsersAdvanced;
use App\Livewire\Admin\UsersBasic;
use App\Livewire\Admin\UsersExpert;
use App\Livewire\Demo;
use App\Livewire\ItunesAdvanced;
use App\Livewire\ItunesBasic;
use App\Livewire\Shop;
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

Route::view('/', 'home')->name('home');;
Route::get('shop', Shop::class)->name('shop');
Route::get('itunes-basic', ItunesBasic::class)->name('itunes-basic');
Route::get('itunes-advanced', ItunesAdvanced::class)->name('itunes-advanced');
Route::view('contact', 'contact')->name('contact');
Route::view('playground', 'playground')->name('playground');
Route::get('eloquent-models', Demo::class)->name('eloquent-models');
Route::get('log-example', \App\Livewire\Log::class)->name('log-example');
Route::view('under-construction', 'under-construction')->name('under-construction');
Route::middleware(['auth', 'admin', 'active'])->prefix('admin')->name('admin.')->group(function () {
    Route::redirect('/', '/admin/records');
    Route::get('genres', Genres::class)->name('genres');
    Route::get('records', Records::class)->name('records');
    Route::get('users/basic', UsersBasic::class)->name('users.basic');
    Route::get('users/advanced', UsersAdvanced::class)->name('users.advanced');
    Route::get('users/expert', UsersExpert::class)->name('users.expert');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'active',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
