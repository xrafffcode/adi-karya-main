<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        $gambar = Carousel::get();
        return view('admin.home', [
            'gambar' => $gambar
        ]);
    }
}
