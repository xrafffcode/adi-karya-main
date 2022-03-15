<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Carousel;
use App\Models\Pemilik;
use App\Models\Testimoni;
use Illuminate\Support\Facades\DB;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $about = About::get();
        $gambar = Carousel::get();
        $pemilik = Pemilik::get();
        $testimoni = Testimoni::get();
        $produk = DB::table('produk')->get();
        VisitLog::save();

        return view('home', [
            'gambar' => $gambar,
            'about' => $about,
            'testimoni' => $testimoni,
            'pemilik' => $pemilik,
            'produk' => $produk
        ]);
    }
}
