<?php

use App\Http\Controllers\UploadFileController;
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


Route::get('/file/view', function () {
    return view('pages.uploadFiles');
})->name('upload.view');


Route::post('/file', [UploadFileController::class, 'store'])->name('upload');
Route::delete('/file',[UploadFileController::class,'delete'])->name('remove');

