<?php

namespace App\Http\Controllers;
use Intervention\Image\ImageManagerStatic as Image;
use Uuid;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class OrganizerLombaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('organizer.lomba.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('organizer.lomba.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
      $file_name = "";
      $uuid = Uuid::generate(1);
  
      if(Input::hasFile('foto')){


          $file = Input::file('foto');
          // echo $file->getClientOriginalExtension();
          // echo $file->getSize();
          // dd($request->toArray());
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


        $name = $request->name;
        $description = $request->description;
        $tanggal_lomba = $request->tanggal_lomba;
        $type = $request->type;

        if ($name == null) {
          return "mohon nama di isi ";
        }

        $lomba = new \App\Lomba;
        $lomba->organizer_id = 0;
        $lomba->name = $name;
        $lomba->show = '1';
        $lomba->url_pendaftaran = $request->url_pendaftaran;
        $lomba->description = $description;
        $lomba->poster = "/uploads/".$file_name;
        $lomba->tanggal_lomba = $tanggal_lomba;
        $lomba->type = $type;
        $lomba->tipe_lomba = $request->tipe_lomba;
        $lomba->tipe_konten = $request->tipe_konten;
        $lomba->save();
        // return redirect('organizer/lomba');
        return redirect('organizer/lomba/'.$lomba->id.'/edit');
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
        $lomba = \App\Lomba::find($id);
        $lomba->kategori = \App\LombaKategori::where('lomba_id', $id)->get();

        return view('organizer.lomba.show')->with('lomba',$lomba);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $lomba = \App\Lomba::find($id);

      return view('organizer.lomba.edit')->with('lomba', $lomba);
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
      $file_name = "";
      $uuid = Uuid::generate(1);
      $lomba = \App\Lomba::find($id);
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
          $lomba->poster = "/uploads/".$file_name;
    // echo '';
      }

          $name = $request->name;
          $description = $request->description;
          $tanggal_lomba = $request->tanggal_lomba;
          $type = $request->type;

          if ($name == null) {
            return "mohon nama di isi ";
          }

          $lomba->status = $request->status;
          $lomba->organizer_id = 0;
          $lomba->name = $name;
          $lomba->url_pendaftaran = $request->url_pendaftaran;
          $lomba->show = $request->show;
          $lomba->description = $description;
          $lomba->tanggal_lomba = $tanggal_lomba;
          $lomba->type = $type;
          $lomba->tipe_lomba = $request->tipe_lomba;
          $lomba->tipe_konten = $request->tipe_konten;
          $lomba->save();
          return redirect('organizer/lomba');
      }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $lomba = \App\Lomba::find($id);
      $lomba->delete();
      return 'ok';
    }

    function delete($id){

      $lomba = \App\Lomba::find($id);
      return view('organizer/lomba.delete')->with('lomba',$lomba);
    }


}
