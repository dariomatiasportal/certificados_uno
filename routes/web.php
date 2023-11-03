<?php

use Illuminate\Support\Facades\Route;


use App\Http\Controllers\PdfController;



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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/{record}/pdf/download', [\App\Http\Controllers\DownloadPdfController::class, 'download'])->name('certificate.pdf.download');

Route::get('pdf/{order}', PdfController::class)->name('pdf');
