<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
})->name('home');

Route::get('/new', function () {
    return view('new');
})->name('new');

Route::get('/search', function () {
    return view('search');
})->name('search');

Route::get('/profile', function () {
    return view('profile');
})->name('profile');

Route::get('/admin', function () {
    return view('admin');
})->middleware(['admin'])->name('admin');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
