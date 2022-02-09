<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use File;

class CarouselController extends Controller
{

    public function upload(){
		$gambar = Carousel::get();
		return view('upload',['gambar' => $gambar]);
	}

    public function proses_upload(Request $request){
		$this->validate($request, [
			'foto' => 'required|file|image|mimes:jpeg,png,jpg|max:5048',	
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$foto = $request->file('foto');
 
		$nama_foto = time()."_".$foto->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'foto_carousel';
		$foto->move($tujuan_upload,$nama_foto);
 
		Carousel::create([
			'foto' => $nama_foto,	
		]);
 
		return redirect()->back();
		$foto->move($tujuan_upload,$foto->getClientOriginalName());
	}

    public function hapus($id_foto){
	// hapus file
	$gambar = Carousel::where('id_foto',$id_foto)->first();
	File::delete('foto_carousel/'.$gambar->foto);

	// hapus data
	Carousel::where('id_foto',$id_foto)->delete();

	return redirect()->back();
}
}
