<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\TestimoniController;
use App\Models\About;
use App\Models\Pemilik;
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

Route::get('/', HomeController::class . '@index');

Route::get('/about', function(){

    $about = About::get();
    $pemilik = Pemilik::get();

    return view('about',[
        'about' => $about,
        'pemilik' => $pemilik,
    ]);
});



Route::get('/login', function(){
    return view('auth.login');
});

Route::get('/admin', AdminController::class . '@index');

Route::get('/admin/carousel', CarouselController::class . '@index');
Route::post('/admin/carousel/upload', CarouselController::class . '@store');
Route::get('/admin/carousel/hapus/{id_foto}', CarouselController::class . '@destroy');

Route::resource('admin/about', AboutController::class);

Route::resource('admin/pemilik', PemilikController::class);

Route::resource('admin/testimoni', TestimoniController::class);

Route::post('/about/upload', AdminController::class . '@proses_upload_about');
Route::post('/about/update', AdminController::class . '@update_about');

Route::post('/pemilik/upload', AdminController::class . '@proses_upload_pemilik');
Route::get('/pemilik/hapus/{id}', AdminController::class . '@hapus_pemilik');

Route::post('/testimoni/upload', AdminController::class . '@proses_upload_testimoni');


Auth::routes();

