<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Site\SiteController;
use App\Http\Controllers\Admin\SupportController;

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
//post support
Route::post('/supports', [SupportController::class,'store'])->name('supports.store');
// Create Support
Route::get('/supports/create', [SupportController::class, 'create'])->name('supports.create');
// Show Supports Page
Route::get('/supports', [SupportController::class,'index'])->name('supports.index');
//Contact Page
Route::get('/contact', [SiteController::class,('contact')]);


// Home
Route::get('/', function () {
    return view('welcome');
});

