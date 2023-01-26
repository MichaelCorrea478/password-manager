<?php

use App\Http\Controllers\FolderController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group([
    'prefix' => 'folders',
    'middleware' => ['auth']
], function() {
    Route::get('/', [FolderController::class, 'index'])->name('folders.index');
    Route::get('/{folder}', [FolderController::class, 'show'])->name('folders.show');
    Route::get('/fetch', [FolderController::class, 'getFolders'])->name('folders.fetch');
});




Route::resource('passwords', App\Http\Controllers\PasswordController::class);
