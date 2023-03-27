<?php

use App\Facades\StorageHelper;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/upload', function() {
//    $file = public_path('dummy/img_category/accessory.jpeg');

    $file = public_path('google.pdf');
    $rs = StorageHelper::copy('abc.pdf', '/');
//
//    $path ='google_64214b95887ef.pdf';
//    $rs =  StorageHelper::delete($path);
        dd($rs);
});

Route::post('/upload', function(Request $request) {
    $rs = StorageHelper::store($request->file);
    dd($rs);
});
