<?php

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

Route::view('/', 'home');

Route::view('contact', 'contact');

Route::get('admin/records', function (){
    $records = [
        'Queen - <b>Greatest Hits</b>',
        'The Rolling Stones - <em>Sticky Fingers</em>',
        'The Beatles - Abbey Road'
    ];

    return view('admin.records.index', [
        'records' => $records
    ]);
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
