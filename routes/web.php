<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BillController;
use App\Http\Controllers\JoinController;
use App\Http\Controllers\PageController;

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

Route::get('/coba', function () {
    return view('coba');
});
Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [PageController::class, 'index'])
    ->middleware(['auth', 'verified'])->name('dashboard');
Route::get('/form', [PageController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('form');
Route::get('/riwayat', [PageController::class, 'show'])
    ->middleware(['auth', 'verified'])->name('riwayat');
Route::post('/daftar', [JoinController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('daftar');
Route::get('/pay', [BillController::class, 'create'])
    ->middleware(['auth', 'verified'])->name('pay');
Route::post('/bayar', [BillController::class, 'store'])
    ->middleware(['auth', 'verified'])->name('bayar');
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__ . '/auth.php';
