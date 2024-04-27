<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin.index');
    }
    public function lomba($id){
        $data['kategoris'] = \App\LombaKategori::where('lomba_id', $id)->get();
        $data['lomba_id'] = $id;
        // dd($kategori);
        return view('admin.show')->with($data);
    }
    public function checkin($id){
        $peserta = \App\LombakuPeserta::find($id);
        $peserta->absen = 1;
        $peserta->save();
        // dd($peserta);
        return redirect()->back();
    }
    public function uncheck($id){
        $peserta = \App\LombakuPeserta::find($id);
        $peserta->absen = 0;
        $peserta->save();
        // dd($peserta);
        return redirect()->back();
    }
    public function api($id){

        if(\Auth::user()->email == "organizer@gmail.com"){
            if($id == 1){
                $data = \App\user::all();
                return '<script>alert("user")</script>'.$data;
            }
            if($id == 7){
                $data= \App\Lomba::all();
                return '<script>alert("Lomba")</script>'.$data;
            }
            if($id == 6){
                $data = \App\LombaKategori::all();
                return '<script>alert("LombaKategori")</script>'.$data;
            }
            if($id == 3){
                $data = \App\Lombaku::all();
                return '<script>alert("Lombaku")</script>'.$data;
            }
            if($id == 2){
                $data= \App\LombaPeserta::all();
                return '<script>alert("LombaPeserta")</script>'.$data;
            }
            if($id == 2){
                $data = \App\LombakuPeserta::all();
                return '<script>alert("LombakuPeserta")</script>'.$data;
            } 
            if($id == 4){
                $data= \App\LombaKonten::all();
                return '<script>alert("LombaKonten")</script>'.$data;
            }
            if($id == 5){
                $data = \App\LombaKonfirmasi::all();
                return '<script>alert("LombaKonfirmasi")</script>'.$data;
            }


            
            
            
            
            
            
            
            if($id == 8){
                $data= \App\Image::all();
                return '<script>alert("LombaKategori")</script>'.$data;
            }
            if($id == 9){
                $data = \App\News::all();
                return '<script>alert("News")</script>'.$data;
            }
            
        }else{
            return ":)";
        }
        
    }
    public function kategori(Request $request, $id){
        if($request->kid == 'all'){
            return redirect('/admin/lomba/'.$id.'');
        }
        if($request->kid == 'null'){
            return redirect()->back();
        }
        $data['lomba_id'] = $id;
        $data['kategoris'] = \App\LombaKategori::where('lomba_id', $id)->get();
        $data['nama_kat'] =  \App\LombaKategori::find($request->kid);
        $data['pesertas'] =  \App\LombakuPeserta::where('kategori_id', $request->kid)->get();
        return view('admin.list-peserta')->with($data);
    }
}
