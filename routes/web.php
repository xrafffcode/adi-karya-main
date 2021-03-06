<?php

use App\Http\Controllers\AboutController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CarouselController;
use App\Http\Controllers\ContactUsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PemilikController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\TestimoniController;
use App\Models\About;
use App\Models\Pemilik;
use App\Models\Produk;
use Facade\FlareClient\View;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

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
    $produk = Produk::get();

    return view('about',[
        'about' => $about,
        'pemilik' => $pemilik,
        'produk' => $produk
    ]);
});

Route::get('/product', function(){
    VisitLog::save();
    $produk = DB::table('produk')->get();

    return view('product',[
        'produk' => $produk,
    ]);
});

Route::get('/contact', function(){
    VisitLog::save();
    $produk = Produk::get();

    return view('contact',[
        'produk' => $produk,
    ]);
});


Route::resource('contactus', ContactUsController::class);


Route::get('/login', function(){
    return view('auth.login');
});

Route::get('/admin', AdminController::class . '@index');

Route::get('/admin/carousel', CarouselController::class . '@index');
Route::post('/admin/carousel/upload', CarouselController::class . '@store');
Route::get('/admin/carousel/hapus/{id_foto}', CarouselController::class . '@destroy');

Route::resource('admin/about', AboutController::class);
Route::post('/about/upload', AboutController::class . '@store');
Route::post('/about/update', AboutController::class . '@update');

Route::resource('admin/pemilik', PemilikController::class);

Route::resource('admin/testimoni', TestimoniController::class);

Route::resource('admin/product', ProductController::class);
Route::get('/admin/produk/hapus/{id}', ProductController::class . '@destroy');

Route::get('/produk/{nama_produk}', ProductController::class . '@show');


Route::post('/pemilik/upload', AdminController::class . '@proses_upload_pemilik');
Route::get('/pemilik/hapus/{id}', AdminController::class . '@hapus_pemilik');

Route::post('/testimoni/upload', AdminController::class . '@proses_upload_testimoni');

view()->composer('errors::*', function ($view) {
    $produk = Produk::get();
    $view->with('produk', $produk);
});
Auth::routes();

