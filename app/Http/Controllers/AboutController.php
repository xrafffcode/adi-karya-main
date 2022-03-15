<?php

namespace App\Http\Controllers;

use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $about = About::get();

        return view('admin.about',[
            'about' => $about,
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
			'image' => 'required|file|image|mimes:jpeg,png,jpg',
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
        $about = About::where('id', $id)->first();

        return view('admin.edit_about', ['about'=>$about]);
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
      		// $image = $request->file('image');
			// $nama_foto = time()."_".$image->getClientOriginalName();
			// $tujuan_upload = 'foto_about';
			// $image->move($tujuan_upload,$nama_foto);

			DB::table('about')->where('id',$request->id)->update([
				// 'image' => $nama_foto,
				'deskripsi' => $request->deskripsi,
				'client' => $request->client
			]);
		
		

		return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
