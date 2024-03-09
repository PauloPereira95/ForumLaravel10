<?php

use App\Enums\SupportStatus;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;
use App\Http\Controllers\Admin\ReplySupportController;

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
//// // teste enum
//Route::get("/test", function () {
//    dd(array_column(SupportStatus::cases(),'name'));
//});


//Contact Page
Route::get('/contact', [SiteController::class, ('contact')]);


// Home
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // List Replys of one support
    Route::get('/supports/{id}/replies', [ReplySupportController::class, 'index'])->name('replies.index');
    Route::post('/supports/{id}/replies', [ReplySupportController::class, 'store'])->name('replies.store');

    //Delete Support
    Route::delete('/supports/{id}', [SupportController::class, 'destroy'])->name('supports.destroy');


    //Submit update Support
    Route::put('/supports/{id}', [SupportController::class, 'update'])->name('supports.update');

    // Edit Support
    Route::get('/supports/{id}/edit', [SupportController::class, 'edit'])->name('supports.edit');

    // Create Support
    Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');


    //post support
    Route::post('/supports', [SupportController::class, 'store'])->name('supports.store');
    // Show Supports Page
    Route::get('/supports', [SupportController::class, 'index'])->name('supports.index');

});

require __DIR__ . '/auth.php';

