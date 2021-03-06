<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Carousel;
use App\Models\Contact;
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
		$contact = Contact::all();

        return view('admin.home', [
            'gambar' => $gambar,
            'about' => $about,
			'pemilik' => $pemilik,
			'testimoni' => $testimoni,
			'visitor' => $visitLogs,
			'contact' => $contact
        ]);
    }




	public function hapus_about($id){
		$about = About::where('id',$id)->first();
		File::delete('foto_about/'.$about->image);

		About::where('id',$id)->delete();

		return redirect()->back();
	}

	public function proses_upload_pemilik(Request $request){
        $this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg',
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

    }

	public function hapus_pemilik($id){
		$pemilik = Pemilik::where('id',$id)->first();
		File::delete('foto_pemilik/'.$pemilik->image);

		Pemilik::where('id',$id)->delete();

		return redirect()->back();
	}

	public function proses_upload_testimoni(Request $request){
		$this->validate($request, [
			'image' => 'required|file|image|mimes:jpeg,png,jpg',
			'nama' => 'required',
			'testimoni' => 'required',
			'profesi' => 'required'	
		]);

		$image = $request->file('image');
 
		$nama_foto = time()."_".$image->getClientOriginalName();
 
		// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'foto_testimoni';
		$image->move($tujuan_upload,$nama_foto);
 
		Testimoni::create([
			'image' => $nama_foto,
			'nama' => $request->nama,
			'testimoni' => $request->testimoni,
			'profesi' => $request->profesi,	
		]);
 
		return redirect()->back();
		$image->move($tujuan_upload,$image->getClientOriginalName());
	}
}
