<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use File;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gambar = Carousel::get();
        return view('admin.carousel',[
            'gambar' => $gambar
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
			'foto' => 'required|file|image|mimes:jpeg,png,jpg',	
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_foto)
    {
        // hapus file
        $gambar = Carousel::where('id_foto',$id_foto)->first();
        File::delete('foto_carousel/'.$gambar->foto);

        // hapus data
        Carousel::where('id_foto',$id_foto)->delete();

        return redirect()->back();
    }
}
