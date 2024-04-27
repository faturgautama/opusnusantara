<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OrganizerLombaKategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //kosong
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lomba_id)
    {
        $lomba = \App\Lomba::find($lomba_id);
        return view('organizer.lomba.kategori.add')->with('lomba',$lomba);
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$lombaId)
    {
        $name = $request->name;
        $min = $request->min;
        $max = $request->max;
        $song_type = $request->song_type;
        $song_set = $request->song_set;
        $song1 = $request->song1;
        $song2 = $request->song2;
        $song3 = $request->song3;
        $song4 = $request->song4;
        $song5 = $request->song5;
        $song6 = $request->song6;
        $song7 = $request->song7;
        $song8 = $request->song8;
        $song9 = $request->song9;
        $song10 = $request->song10;

        $song_type_final = $request->song_type_final;
        $song_set_final = $request->song_set_final;
        $song1_final = $request->song1_final;
        $song2_final = $request->song2_final;
        $song3_final = $request->song3_final;
        $song4_final = $request->song4_final;
        $song5_final = $request->song5_final;
        $song6_final = $request->song6_final;
        $song7_final = $request->song7_final;
        $song8_final = $request->song8_final;
        $song9_final = $request->song9_final;
        $song10_final = $request->song10_final;
        // dd($request->toArray());
        //
        $lombaKategori = new \App\LombaKategori;
        $lombaKategori->lomba_id = $lombaId;
        $lombaKategori->name = $name;
        $lombaKategori->min = $min;
        $lombaKategori->max = $max;
        $lombaKategori->biaya = $request->biaya;
        $lombaKategori->song_type = $song_type;
        $lombaKategori->song_set = $song_set;
        $lombaKategori->song1 = $song1;
        $lombaKategori->song2 = $song2;
        $lombaKategori->song3 = $song3;
        $lombaKategori->song4 = $song4;
        $lombaKategori->song5 = $song5;
        $lombaKategori->song6 = $song6;
        $lombaKategori->song7 = $song7;
        $lombaKategori->song8 = $song8;
        $lombaKategori->song9 = $song9;
        $lombaKategori->song10 = $song10;

        $lombaKategori->song_type_final = $song_type_final;
        $lombaKategori->song_set_final = $song_set_final;
        $lombaKategori->song1_final = $song1_final;
        $lombaKategori->song2_final = $song2_final;
        $lombaKategori->song3_final = $song3_final;
        $lombaKategori->song4_final = $song4_final;
        $lombaKategori->song5_final = $song5_final;
        $lombaKategori->song6_final = $song6_final;
        $lombaKategori->song7_final = $song7_final;
        $lombaKategori->song8_final = $song8_final;
        $lombaKategori->song9_final = $song9_final;
        $lombaKategori->song10_final = $song10_final;

        $lombaKategori->save();

        //insert ke konten lagu
        if($request->song1 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song1;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song2 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song2;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song3 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song3;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song4 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song4;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song5 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song5;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song6 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song6;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song7 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song7;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song8 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song8;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song9 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song9;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song10 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song10;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }


        //insert konten from final
        if($request->song1_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song1_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song2_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song2_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song3_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song3_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song4_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song4_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song5_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song5_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song6_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song6_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song7_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song7_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song8_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song8_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song9_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song9_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song10_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song10_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        // dd($request->toArray());
        
        return redirect('organizer/lomba/'.$lombaId.'/edit');
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
    public function edit($lombaId, $id)
    {
        
        $kategori = \App\LombaKategori::find($id);
        return view('organizer.lomba.kategori.edit')->with('kategori',$kategori);


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $lombaId,$id)

    {
        //
        $name = $request->name;
        $min = $request->min;
        $max = $request->max;
        $song_type = $request->song_type;
        $song_set = $request->song_set;
        $song1 = $request->song1;
        $song2 = $request->song2;
        $song3 = $request->song3;
        $song4 = $request->song4;
        $song5 = $request->song5;
        $song6 = $request->song6;
        $song7 = $request->song7;
        $song8 = $request->song8;
        $song9 = $request->song9;
        $song10 = $request->song10;

        $song_type_final = $request->song_type_final;
        $song_set_final = $request->song_set_final;
        $song1_final = $request->song1_final;
        $song2_final = $request->song2_final;
        $song3_final = $request->song3_final;
        $song4_final = $request->song4_final;
        $song5_final = $request->song5_final;
        $song6_final = $request->song6_final;
        $song7_final = $request->song7_final;
        $song8_final = $request->song8_final;
        $song9_final = $request->song9_final;
        $song10_final = $request->song10_final;

        //
        $lombaKategori = \App\LombaKategori::find($id);
        $lombaKategori->lomba_id = $lombaId;
        $lombaKategori->name = $name;
        $lombaKategori->min = $min;
        $lombaKategori->max = $max;
        $lombaKategori->biaya = $request->biaya;
        $lombaKategori->song_type = $song_type;
        $lombaKategori->song_set = $song_set;
        $lombaKategori->song1 = $song1;
        $lombaKategori->song2 = $song2;
        $lombaKategori->song3 = $song3;
        $lombaKategori->song4 = $song4;
        $lombaKategori->song5 = $song5;
        $lombaKategori->song6 = $song6;
        $lombaKategori->song7 = $song7;
        $lombaKategori->song8 = $song8;
        $lombaKategori->song9 = $song9;
        $lombaKategori->song10 = $song10;

        $lombaKategori->song_type_final = $song_type_final;
        $lombaKategori->song_set_final = $song_set_final;
        $lombaKategori->song1_final = $song1_final;
        $lombaKategori->song2_final = $song2_final;
        $lombaKategori->song3_final = $song3_final;
        $lombaKategori->song4_final = $song4_final;
        $lombaKategori->song5_final = $song5_final;
        $lombaKategori->song6_final = $song6_final;
        $lombaKategori->song7_final = $song7_final;
        $lombaKategori->song8_final = $song8_final;
        $lombaKategori->song9_final = $song9_final;
        $lombaKategori->song10_final = $song10_final;
        
        $lombaKategori->save();



        //delete konten dulu
        $konten = \App\LombaKonten::where('lomba_id',$lombaId);
        $konten->delete();

        //insert ulang konten
        if($request->song1 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song1;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song2 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song2;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song3 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song3;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song4 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song4;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song5 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song5;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song6 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song6;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song7 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song7;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song8 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song8;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song9 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song9;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song10 !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song10;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }


        //insert konten from final
        if($request->song1_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song1_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song2_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song2_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song3_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song3_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song4_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song4_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song5_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song5_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song6_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song6_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song7_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song7_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song8_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song8_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song9_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song9_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        if($request->song10_final !=null){
            $konten = new \App\LombaKonten;
            $konten->lomba_id = $lombaId;
            $konten->judul = $request->song10_final;
            $konten->konten = null;
            $konten->tipe = 'html';
            $konten->link = null;
            $konten->save();
        }
        
        return redirect('organizer/lomba/'.$lombaId.'/edit');
     }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lomba_id, $id)
    {
        // echo $lomba_id;
        // echo $id;
        $lombaKategori = \App\LombaKategori::find($id);
        $lombaKategori->delete();

        $konten = \App\LombaKonten::where('lomba_id',$lomba_id);
        $konten->delete();
        return 'ok';
    }

    public function apiCategory($id)
    {
        $data = \App\LombaKategori::find($id);
        $send['name'] = $data['name'];
        $send['song_type'] = $data['song_type'];
        $send['song_type_final'] = $data['song_type_final'];
        
        return response($send);

    }
}
