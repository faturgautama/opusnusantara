<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use App\LombaKonten;
use Illuminate\Support\Facades\Input;

class LombaKontenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($lombaId)
    {
        $lomba = \App\Lomba::find($lombaId);
        return view ('organizer.lomba.konten.add')->with('lomba', $lomba);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $lombaId)
    {

        $file_name = "";
        $uuid = Uuid::generate(1);
        $konten = new \App\LombaKonten;
    
        if(Input::hasFile('pdf')){
  
  
            $file = Input::file('pdf');
  
            // prevent possible upsizing
  
            $file_name = $uuid.".".$file->getClientOriginalExtension();
            $path = public_path('uploads/' . $file_name);
            $file->move('uploads', $file_name);
            $konten->pdf = '/uploads/'.$file_name;

        }

        if(Input::hasFile('image')){
  
  
            $file = Input::file('image');
  
            // prevent possible upsizing
  
            $file_name = $uuid.".".$file->getClientOriginalExtension();
            $path = public_path('uploads/' . $file_name);
            $file->move('uploads', $file_name);
            $konten->image = '/uploads/'.$file_name;


        }

        
        $konten->lomba_id = $lombaId;
        $konten->judul = $request->judul;
        $konten->konten = $request->konten;
        $konten->tipe = $request->tipe;
        $konten->link = $request->link;
        $konten->save();

        return redirect('/organizer/lomba/'.$lombaId.'/edit');
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
        $konten = \App\LombaKonten::find($id);
        return view ('organizer.lomba.konten.edit')->with('konten', $konten);
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
        $uuid = Uuid::generate(1);
        $konten =  \App\LombaKonten::find($id);

        if(Input::hasFile('pdf')){
  
  
            $file = Input::file('pdf');
  
            $file_name = $uuid.".".$file->getClientOriginalExtension();
            $path = public_path('uploads/' . $file_name);
            $file->move('uploads', $file_name);
            $konten->pdf = '/uploads/'.$file_name;

        }

        if(Input::hasFile('image')){
  
  
            $file = Input::file('image');
  
            $file_name = $uuid.".".$file->getClientOriginalExtension();
            $path = public_path('uploads/' . $file_name);
            $file->move('uploads', $file_name);
            $konten->image = '/uploads/'.$file_name;

        }
       
        $konten->lomba_id = $lombaId;
        $konten->judul = $request->judul;
        $konten->konten = $request->konten;
        $konten->tipe = $request->tipe;
        $konten->link = $request->link;
        $konten->save();

        return redirect('/organizer/lomba/'.$lombaId.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($lombaId, $id)
    {
        $konten = \App\LombaKonten::find($id);
       
        $konten->delete();
        return 'ok';
    }
}
