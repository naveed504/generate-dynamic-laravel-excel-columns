<?php

use App\Http\Controllers\Excel\ExcelFileController;
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
    return view('importexcel');
});

/**
 * Import Excel File Into DB
 */
Route::post('import-excel-files',[ExcelFileController::class, 'importExcelFile'])->name('importexcel');