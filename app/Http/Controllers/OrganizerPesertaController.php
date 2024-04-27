<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class OrganizerPesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lombaId, $id)
    {
        $peserta = \App\LombakuPeserta::find($id);
        // dd($peserta);
        return view('organizer.peserta.show')->with('peserta',$peserta);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lombaId, $id)
    {
        $peserta = \App\LombakuPeserta::find($id);
        // dd($peserta);
        return view('organizer.peserta.edit')->with('peserta',$peserta);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lombaId, $id)
    {
        $file_name = "";
        $file_name_akte = "";
        $uuid = Uuid::generate(1);
        $uuid_akte = Uuid::generate(1);
        // dd($request);
        // $uploadedFile = $request->file('foto');   
        // $imageName = $uuid.'.'.$request->file('foto')->getClientOriginalExtension();
        // $path = $uploadedFile->store('public/files');
        // $request->foto->move(public_path('images'), $imageName);
        if(Input::hasFile('foto')){

			
            $file = Input::file('foto');
            
            // prevent possible upsizing
           
            $file_name = $uuid.".".$file->getClientOriginalExtension();
            $path = public_path('uploads/' . $file_name);
            // $file->move('uploads', $file_name);

            $img = Image::make($file->getRealPath());
            $img->resize(null, 700, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path);
			// echo '';
        }

        if(Input::hasFile('akte')){

			
            $file_akte = Input::file('akte');
            
            // prevent possible upsizing
           
            $file_name_akte = $uuid_akte.".".$file_akte->getClientOriginalExtension();
            $path_akte = public_path('uploads/' . $file_name_akte);
            // $file->move('uploads', $file_name);

            $file_akte->move(public_path('uploads'), $file_name_akte);
			// echo '';
        }

        $lombakuPeserta = \App\LombakuPeserta::find($id);
        $peserta = \App\LombaPeserta::find($lombakuPeserta->lomba_peserta_id);
        $peserta->nama = $request->nama;
        $peserta->tempat_lahir = $request->tempat_lahir;
        $peserta->tanggal_lahir = $request->tanggal_lahir;
        $peserta->alamat = $request->alamat;
        $peserta->nohp = $request->nohp;
        $peserta->email = $request->email;
    
        $peserta->sekolah_tingkat = $request->sekolah_tingkat;
        $peserta->sekolah_nama = $request->sekolah_nama;
        
        if($file_name == ''){
            $file_name = $peserta->foto;
        }

        if($file_name_akte == ''){
            $file_name_akte = $peserta->akte;
        }

        $peserta->foto = $file_name;
        $peserta->akte = $file_name_akte;
        $peserta->save();

        

        $kategori = \App\LombaKategori::find($request->kategori_id);

        
        $lombakuPeserta->lombaku_id = $lombaId;
        $lombakuPeserta->lomba_peserta_id = $peserta->id;
        $lombakuPeserta->nama = $request->nama;
        $lombakuPeserta->tempat_lahir = $request->tempat_lahir;
        $lombakuPeserta->tanggal_lahir = $request->tanggal_lahir;
        $lombakuPeserta->alamat = $request->alamat;
        $lombakuPeserta->nohp = $request->nohp;
        $lombakuPeserta->email = $request->email;
        $lombakuPeserta->sekolah_tingkat = $request->sekolah_tingkat;
        $lombakuPeserta->sekolah_nama = $request->sekolah_nama;
        $lombakuPeserta->foto = $file_name;
        $lombakuPeserta->akte = $file_name_akte;
        $lombakuPeserta->kategori_id = $request->kategori_id;
        $lombakuPeserta->biaya = $kategori->biaya;
        $lombakuPeserta->no_undian = $request->no_undian;
        $lombakuPeserta->song1 = $request->song1;
        $lombakuPeserta->song2 = $request->song2;
        $lombakuPeserta->song3 = $request->song3;
        $lombakuPeserta->song4 = $request->song4;
        $lombakuPeserta->song5 = $request->song5;
        $lombakuPeserta->song6 = $request->song6;
        $lombakuPeserta->song7 = $request->song7;
        $lombakuPeserta->song8 = $request->song8;
        $lombakuPeserta->song9 = $request->song9;
        $lombakuPeserta->song10 = $request->song10;
        $lombakuPeserta->song1_final = $request->song_final1;
        $lombakuPeserta->song2_final = $request->song_final2;
        $lombakuPeserta->song3_final = $request->song_final3;
        $lombakuPeserta->save();

        return redirect('/organizer/lomba/'.$lombaId.'/peserta/'.$id);
    }

    public function reset_undian($lombaId, $pesertaId){
        $peserta = \App\LombakuPeserta::find($pesertaId);
        $peserta->no_undian = null;
        $peserta->save();

        return $peserta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lombaId, $pesertaId)
    {
        $lombakuPeserta = \App\LombakuPeserta::find($pesertaId);

        $lombakuPeserta->delete();

        return 'ok';
    }
}
