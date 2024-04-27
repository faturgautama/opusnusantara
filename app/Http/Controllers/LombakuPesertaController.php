<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;

class LombakuPesertaController extends Controller
{
    // private function cek($id){
    //     $lomba = \App\Lombaku::find($id);
    //     if($lomba->peserta->count() < 1){
    //         return redirect('/lombaku/'.$id.'/peserta');
    //     }

    //     if($lomba->metode_pembayaran != null){
    //         return redirect('/lombaku/'.$id.'/pembayaran');
    //     }
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($lombaId)
    {


        $lomba = \App\Lombaku::find($lombaId);
        if($lomba->metode_pembayaran != null){
            return redirect('/lombaku/'.$lombaId.'/pembayaran');
        }

        if($lomba == null){
            return redirect('/lombaku');
        }
        return view('lombaku.peserta.index')->with('lomba', $lomba);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lombaId)
    {
        $lomba = \App\Lombaku::find($lombaId);
        if($lomba->metode_pembayaran != null){
            return redirect('/lombaku/'.$lombaId.'/pembayaran');
        }
        $lomba = \App\Lombaku::find($lombaId);
        if($lomba->metode_pembayaran != null){
            return redirect('/lombaku/'.$lombaId.'/pembayaran');
        }
        return view('lombaku.peserta.add')->with('lomba', $lomba);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lombaId)
    {
        // dd($request->toArray());
        $lomba = \App\Lombaku::find($lombaId);
        if($lomba->metode_pembayaran != null){
            return redirect('/lombaku/'.$lombaId.'/pembayaran');
        }

        // $cek = \App\LombakuPeserta::where('peserta_id',$request->)->where('kategori_id', $request->kategori_id)->first();
        // if($cek){

        //     return redirect()->back()->with('error', 'Something went wrong.');

        // }

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
            if($file->getSize() >5000000){
                return 'Size file tidak boleh lebih dari 5Mb';
            }

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
            if($file->getSize() >5000000){
                return 'Size file tidak boleh lebih dari 5Mb';
            }

            // prevent possible upsizing

            $file_name_akte = $uuid_akte.".".$file_akte->getClientOriginalExtension();
            $path_akte = public_path('uploads/' . $file_name_akte);
            // $file->move('uploads', $file_name);

            $file_akte->move(public_path('uploads'), $file_name_akte);
			// echo '';
        }



        if($request->peserta_id == null){

            $peserta = new \App\LombaPeserta;
            $peserta->user_id = \Auth::id();
            $peserta->nama = $request->nama;
            $peserta->tempat_lahir = $request->tempat_lahir;
            $peserta->tanggal_lahir = $request->tanggal_lahir;
            $peserta->alamat = $request->alamat ? $request->alamat : '-';
            $peserta->kota = $request->kota ? $request->kota : '-';
            $peserta->provinsi = $request->provinsi ? $request->provinsi : '-';
            $peserta->nohp = $request->nohp;
            $peserta->email = $request->email;
            $peserta->sekolah_tingkat = $request->sekolah_tingkat;
            $peserta->sekolah_nama = $request->sekolah_nama;
            $peserta->foto = $file_name;
            $peserta->akte = $file_name_akte;
            $peserta->save();

        } else {

            $peserta = \App\LombaPeserta::find($request->peserta_id);
            $peserta->nama = $request->nama;
            $peserta->tempat_lahir = $request->tempat_lahir;
            $peserta->tanggal_lahir = $request->tanggal_lahir;
            $peserta->alamat = $request->alamat;
            $peserta->kota = $request->kota;
            $peserta->provinsi = $request->provinsi;
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

        }

        $kategori = \App\LombaKategori::find($request->kategori_id);

        $lombakuPeserta = new \App\LombakuPeserta;
        $lombakuPeserta->lombaku_id = $lombaId;
        $lombakuPeserta->lomba_peserta_id = $peserta->id;
        $lombakuPeserta->nama = $request->nama;
        $lombakuPeserta->tempat_lahir = $request->tempat_lahir;
        $lombakuPeserta->tanggal_lahir = $request->tanggal_lahir;
        $peserta->alamat = $request->alamat ? $request->alamat : '-';
        $peserta->kota = $request->kota ? $request->kota : '-';
        $peserta->provinsi = $request->provinsi ? $request->provinsi : '-';
        $lombakuPeserta->nohp = $request->nohp;
        $lombakuPeserta->email = $request->email;
        $lombakuPeserta->sekolah_tingkat = $request->sekolah_tingkat;
        $lombakuPeserta->sekolah_nama = $request->sekolah_nama;
        $lombakuPeserta->foto = $file_name;
        $lombakuPeserta->akte = $file_name_akte;
        $lombakuPeserta->kategori_id = $request->kategori_id;
        $lombakuPeserta->biaya = $kategori->biaya;
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
        $lombakuPeserta->song1_final = $request->song1_final;
        $lombakuPeserta->song2_final = $request->song2_final;
        $lombakuPeserta->save();

        return redirect('/lombaku/'.$lombaId.'/peserta');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($lombaId, $id)
    {
        //

        return redirect('/lombaku');

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($lombaId, $id)
    {
        $lomba = \App\Lombaku::find($lombaId);
        if($lomba->metode_pembayaran != null){
            return redirect('/lombaku/'.$lombaId.'/pembayaran');
        }

        $peserta = \App\LombakuPeserta::find($id);
        // dd($peserta);
        return view('lombaku.peserta.edit')->with('peserta', $peserta);
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
        $lombakuPeserta->song1_final = $request->song1_final;
        $lombakuPeserta->song2_final = $request->song2_final;
        $lombakuPeserta->save();

        return redirect('/lombaku/'.$lombaId.'/peserta');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lombaId, $id)
    {
        // $this->cek($lombaId);
        $lomba = \App\Lombaku::find($lombaId);
        if($lomba->metode_pembayaran != null){
            return redirect('/lombaku/'.$lombaId.'/pembayaran');
        }
        $lombakuPeserta = \App\LombakuPeserta::find($id);
        $lombakuPeserta->delete();
        return 'ok';
    }

}
