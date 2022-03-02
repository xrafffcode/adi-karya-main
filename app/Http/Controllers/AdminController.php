<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Carousel;
use App\Models\Pemilik;
use App\Models\Testimoni;
use Illuminate\Http\Request;
use Sarfraznawaz2005\VisitLog\Facades\VisitLog;
use File;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
	 public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $gambar = Carousel::get();
        $about = About::get();
		$pemilik = Pemilik::get();
		$testimoni = Testimoni::get();
		$visitLogs = VisitLog::all();

        return view('admin.home', [
            'gambar' => $gambar,
            'about' => $about,
			'pemilik' => $pemilik,
			'testimoni' => $testimoni,
			'visitor' => $visitLogs,
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

	public function edit_about($id){
		$about = About::where('id',$id)->get();
        return view('admin.edit_about', ['about'=>$about]);
	}

	public function update_about(Request $request){

		if($request->hasFile('image')){
			$this->validate($request, [
				'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5048',
				'deskripsi' => 'required',
				'client' => 'required'	
			]);

			$image = $request->file('image');
			$nama_foto = time()."_".$image->getClientOriginalName();
			$tujuan_upload = 'foto_about';
			$image->move($tujuan_upload,$nama_foto);

			DB::table('about')->where('id',$request->id)->update([
				'image' => $nama_foto,
				'deskripsi' => $request->deskripsi,
				'client' => $request->client
			]);
		
		}

		return redirect()->action(AdminController::class.'@index');

	}

	public function hapus_about($id){
		$about = About::where('id',$id)->first();
		File::delete('foto_about/'.$about->image);

		About::where('id',$id)->delete();

		return redirect()->back();
	}

	public function proses_upload_pemilik(Request $request){
        $this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg|max:5048',
            'nama' => 'required',
            'posisi' => 'required'	
		]);

        $image = $request->file('image');
 
		$nama_foto = time()."_".$image->getClientOriginalName();
 
    	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'foto_pemilik';
		$image->move($tujuan_upload,$nama_foto);
 
		Pemilik::create([
			'image' => $nama_foto,
            'nama' => $request->nama,
            'posisi' => $request->posisi	
		]);
 
		return redirect()->back();
		$image->move($tujuan_upload,$image->getClientOriginalName());
    }

	public function hapus_pemilik($id){
		$pemilik = Pemilik::where('id',$id)->first();
		File::delete('foto_pemilik/'.$pemilik->image);

		Pemilik::where('id',$id)->delete();

		return redirect()->back();
	}

}
