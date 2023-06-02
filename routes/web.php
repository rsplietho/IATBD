<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ProductController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserController;



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

Route::get('/search', function () {
    return view('search');
})->name('search');
Route::post('/search', [SearchController::class, 'search']);

Route::get('/new', function () {
    return view('new');
})->name('new')->middleware('auth');

Route::post('/createproduct', [ProductController::class, 'storeProduct'])->middleware('auth');

Route::get('/product/{id}', function () {
    return view('product');
});

Route::post('/loanout', [ProductController::class, 'loanout'])->middleware('auth');
Route::post('/takeback', [ProductController::class, 'takeBack'])->middleware('auth');
Route::post('/removeproduct', [ProductController::class, 'removeProduct'])->middleware('auth');


Route::get('/user/{username}', function () {
    return view('user');
});

Route::get('/user/{username}/edit', function () {
    return view('edit_user');
})->middleware(['auth']);
Route::post('/user/{username}/edit', [UserController::class, 'editUser'])->middleware(['auth']);


Route::post('/user/{username}/block', [UserController::class, 'blockUser'])->middleware(['admin']);

Route::get('/profile', function () {
    return view('profile');
})->middleware(['auth'])->name('profile');

    Route::get('/profile/my_items', function () {
        return view('my_items');
    })->middleware(['auth'])->name('profile.items');

    Route::get('/profile/loaned_items', function () {
        return view('loaned_items');
    })->middleware(['auth'])->name('profile.loaned');



Route::get('/admin', function () {
    return view('admin');
})->middleware(['admin'])->name('admin');

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
