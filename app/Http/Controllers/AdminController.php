<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Carousel;
use Illuminate\Http\Request;
use File;

class AdminController extends Controller
{
    public function index(){
        $gambar = Carousel::get();
        $about = About::get();

        return view('admin.home', [
            'gambar' => $gambar,
            'about' => $about
        ]);
    }

    public function proses_upload_carousel(Request $request){
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

    public function hapus_carousel($id_foto){
        // hapus file
        $gambar = Carousel::where('id_foto',$id_foto)->first();
        File::delete('foto_carousel/'.$gambar->foto);

        // hapus data
        Carousel::where('id_foto',$id_foto)->delete();

        return redirect()->back();
    }

    public function proses_upload_about(Request $request){
        $this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5048',
            'deskripsi' => 'required',
            'client' => 'required'	
		]);

        $image = $request->file('image');
 
		$nama_foto = time()."_".$image->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'foto_about';
		$image->move($tujuan_upload,$nama_foto);
 
		About::create([
			'image' => $nama_foto,
            'deskripsi' => $request->deskripsi,
            'client' => $request->client	
		]);
 
		return redirect()->back();
		$image->move($tujuan_upload,$image->getClientOriginalName());
    }

}
