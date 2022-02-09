<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarouselController;
use App\Models\About;
use App\Models\Carousel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
    $about = About::get();
    $gambar = Carousel::get();
    
    return view('home', [
        'gambar' => $gambar,
        'about' => $about
    ]);
});

Route::get('/login', function(){
    return view('auth.login');
});

Route::get('/admin', AdminController::class . '@index');

Route::post('/carousel/upload', AdminController::class . '@proses_upload_carousel');
Route::get('/carousel/hapus/{id_foto}', AdminController::class . '@hapus_carousel');

Route::post('/about/upload', AdminController::class . '@proses_upload_about');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
