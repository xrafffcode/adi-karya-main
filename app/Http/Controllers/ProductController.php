<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use File;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $produk = DB::table('produk')->get();
        return view('admin.produk',[
            'produk' => $produk,
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
        $image_1 = $request->file('gambar_1');
        $image_2 = $request->file('gambar_2');
        $image_3 = $request->file('gambar_3');
 
		$nama_foto_1 = time()."_".$image_1->getClientOriginalName();
        $nama_foto_2 = time()."_".$image_2->getClientOriginalName();
        $nama_foto_3 = time()."_".$image_3->getClientOriginalName();
 
    	// isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'foto_produk';
		$image_1->move($tujuan_upload,$nama_foto_1);
        $image_2->move($tujuan_upload,$nama_foto_2);
        $image_3->move($tujuan_upload,$nama_foto_3);

        DB::table('produk')->insert([
            'nama_produk' => $request->nama_produk,
            'deskripsi_produk' => $request->deskripsi_produk,
            'gambar_1' => $nama_foto_1,
            'gambar_2' => $nama_foto_2,
            'gambar_3' => $nama_foto_3,
        ]);

        return redirect->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $produk = Produk::get();

        $produks = Produk::find($id);

        return view('detail-product',[
            'produks' => $produks,
            'produk' => $produk,
        ]);
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
    public function destroy($id)
    {
        $produk = DB::table('produk')->where('id',$id)->first();

        File::delete('foto_produk/'.$produk->gambar_1);
        File::delete('foto_produk/'.$produk->gambar_2);
        File::delete('foto_produk/'.$produk->gambar_3);

        DB::table('produk')->where('id',$id)->delete();

        return redirect()->back();
    }
}
