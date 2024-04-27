<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Uuid;
use Illuminate\Support\Facades\Input;
use Intervention\Image\ImageManagerStatic as Image;
use Validator;

class OpusV2Controller extends Controller
{   
    public function login(){
        return view('auth.login');
    }
    public function register(){
        return view('auth.register');
    }
    public function index(){
        $data['news_hot'] = \App\Article::where('articles.type','news')->join('users','users.id','articles.author_id')
        ->select('articles.*','users.name as name')->orderBy('viewed','Desc')->first();
        $data['news_new'] = \App\Article::where('articles.type','news')->join('users','users.id','articles.author_id')
        ->select('articles.*','users.name as name')->orderBy('created_at','Desc')->limit(4)->get();

       
        return view('v2.index')->with($data);
    }
    public function news($uri){
        $data['news_hot'] = \App\Article::where('articles.type','news')->join('users','users.id','articles.author_id')
        ->select('articles.*','users.name as name')->orderBy('viewed','Desc')->first();
        $data['att1'] = $data['news_hot'] ? \App\Attachment::where('id',$data['news_hot']['attach_id'])->first() : null;
        if($uri=='all'){
            $data['news_latest'] = 'not';
            $data['news_all'] = \App\Article::where('articles.type','news')->join('users','users.id','articles.author_id')
        ->select('articles.*','users.name as name')->orderBy('created_at','Desc')->get();
            return view('v2.news-primary')->with($data);
        }elseif($uri=='latest'){
            $data['news_all'] = 'not';
            $data['news_latest'] = \App\Article::where('articles.type','news')->join('users','users.id','articles.author_id')
        ->select('articles.*','users.name as name')->orderBy('created_at','Desc')->get();
            return view('v2.news-primary')->with($data);
        }
        else{
            $data['news_new'] = \App\Article::where('articles.type','news')->join('users','users.id','articles.author_id')
        ->select('articles.*','users.name as name')->orderBy('created_at','Desc')->limit(4)->get();
            $data['news_view'] = \App\Article::where('randuri',$uri)->join('users','users.id','articles.author_id')
            ->select('articles.*','users.name as name')->first();
            $data['news_view']['viewed'] = $data['news_view']['viewed'] +1;
            $data['news_view']->save();
            $data['att1'] = \App\Attachment::where('id',$data['news_view']['attach_id'])->first();
            return view('v2.news')->with($data);
        }
        
    }

    public function changePassword($url){
        
        if($url == 'update'){
            return view('v2.gantiPassword');
        }
    }
    public function updatedPassword($pass){
        $data = \App\User::find(\Auth::user()->id);
        $data->password = bcrypt($pass);
        $data->save();
        \Auth::logout();
        echo "Success";
    } 
    public function live($url = null){
        
        if($url !==null){
            $data['live_hot'] = \App\Article::where('randuri',$url)->join('users','users.id','articles.author_id')
            ->select('articles.*','users.name as name')->orderBy('viewed','Desc')->first();
        }else{
            $data['live_hot'] = \App\Article::where('articles.type','live')->join('users','users.id','articles.author_id')
            ->select('articles.*','users.name as name')->orderBy('viewed','Desc')->first();
        }
        $data['live_new'] = \App\Article::where('articles.type','live')->join('users','users.id','articles.author_id')
        ->select('articles.*','users.name as name')->orderBy('created_at','Desc')->limit(4)->get();
        return view('v2.streaming');
    }
    public function gallery(Request $request,$uri){
        // dd($request);
        $data['lomba'] =\App\Lomba::find($request->lomba_id);
        if($uri == 'competition'){
            $data['lomba_kategori'] =\App\LombaKategori::where('lomba_id',$data['lomba']['id'])->get();
            return view('v2.gallery')->with($data);
        }
        if($uri == 'education'){
            $data['foto'] = \App\GalleryPro::where('lomba_id',$data['lomba']['id'])->get();
            return view('v2.gallery')->with($data);
        }
    }

    public function competition(){
        $data['url'] = 'competition';
        $data['show'] = \App\Lomba::where('tipe_konten','competition')->get();
        $data['selected'] = \App\Lomba::where('tipe_konten','competition')->orderBy('tanggal_lomba','Desc')->first();
        return view('v2.competition')->with($data);
    }
    public function select_competition($uri){
        $data['url'] = 'competition';
        $data['show'] = \App\Lomba::where('tipe_konten','competition')->get();
        $data['selected'] = \App\Lomba::where('tipe_konten','competition')->where('name',str_replace('_',' ',$uri))->first();
        return view('v2.competition')->with($data);
    }
    public function education(){
        $data['url'] = 'education';
        $data['show'] = \App\Lomba::where('tipe_konten','education')->get();
        $data['selected'] = \App\Lomba::where('tipe_konten','education')->orderBy('tanggal_lomba','Desc')->first();
        return view('v2.competition')->with($data);
    }
    public function select_education($uri){
        $data['url'] = 'education';
        $data['show'] = \App\Lomba::where('tipe_konten','education')->get();
        $data['selected'] = \App\Lomba::where('tipe_konten','education')->where('name',str_replace('_',' ',$uri))->first();
        return view('v2.competition')->with($data);
    }
    public function regiter_participant($lomba_id){
        $data['lomba'] = \App\Lombaku::find($lomba_id);
        $data['lomba_kat'] = \App\LombaKategori::where('lomba_id',$lomba_id)->get();
        $data['lombas'] =  \App\Lomba::find($lomba_id);
        // dd($data['lomba']);
        // if($data['lomba']['metode_pembayaran'] != null){
        //     return redirect('/lombaku/'.$lomba_id.'/pembayaran');
        // }
        $lombaku = new \App\Lombaku;
        $lombaku->user_id = \Auth::user()->id;
        $lombaku->lomba_id = $lomba_id;
        $lombaku->status = 201;
        $lombaku->save();
        
        $data['lombaku'] = $lombaku->id;

        // dd($data['lombaku']);

        return view('v2.create-peserta')->with($data);
    }
    public function add_participant(Request $request, $lombaku_id){
        // dd($lombaku_id);
        $data['lomba'] = \App\Lombaku::find($request->lomba_id);
        $data['lomba_kat'] = \App\LombaKategori::where('lomba_id',$request->lomba_id)->get();
        $data['lombas'] =  \App\Lomba::find($request->lomba_id);
        // dd($data['lomba']);
        // if($data['lomba']['metode_pembayaran'] != null){
        //     return redirect('/lombaku/'.$lomba_id.'/pembayaran');
        // }

        
        $data['lombaku'] = $lombaku_id;

        // dd($data['lombaku']);

        return view('v2.create-peserta')->with($data);
    }
    public function dataPeserta(Request $request){
        $data= \App\LombaPeserta::find($request->value);
        $data= json_encode($data);
        echo $data;
    }
    public function save_participant(Request $request, $user_id){
        // dd($request);
        $file_name = "";
        $file_name_akte = "";
        $uuid = Uuid::generate();
        $uuid_akte = Uuid::generate();
        $data['lombaku_id'] = $request->lombaku;
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
            $img_akte = Image::make($file_akte->getRealPath());
            $img_akte->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path_akte);
			// echo '';
        }
        if($request->peserta_id == null){

            $peserta = new \App\LombaPeserta;
            $peserta->user_id = \Auth::user()->id;
            $peserta->nama = str_replace("'","",$request->nama);
            $peserta->tempat_lahir = $request->tempat_lahir;
            $peserta->tanggal_lahir = $request->tanggal_lahir;
            $peserta->alamat = $request->alamat;
            $peserta->kota = $request->kota;
            $peserta->provinsi = $request->provinsi;
            $peserta->nohp = $request->nohp;
            $peserta->email = $request->email;
            $peserta->sekolah_tingkat = $request->sekolah_tingkat;
            $peserta->sekolah_nama = $request->sekolah_nama;
            $peserta->foto = $file_name;
            // $peserta->akte = $file_name_akte;
            $peserta->save();

        } else {

            $peserta = \App\LombaPeserta::find($request->peserta_id);
            $peserta->nama = str_replace("'","",$request->nama);
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
            // $peserta->akte = $file_name_akte;
            $peserta->save();
        }
        $kategori = \App\LombaKategori::find($request->kategori_id);

        $lombakuPeserta = new \App\LombakuPeserta;
        $lombakuPeserta->lombaku_id = $request->lombaku;
        $lombakuPeserta->lomba_peserta_id = $peserta->id;
        $lombakuPeserta->nama = $request->nama;
        $lombakuPeserta->tempat_lahir = $request->tempat_lahir;
        $lombakuPeserta->tanggal_lahir = $request->tanggal_lahir;
        $lombakuPeserta->alamat = $request->alamat;
        $lombakuPeserta->kota = $request->kota;
        $lombakuPeserta->provinsi = $request->provinsi;
        $lombakuPeserta->nohp = $request->nohp;
        $lombakuPeserta->email = $request->email;
        $lombakuPeserta->sekolah_tingkat = $request->sekolah_tingkat;
        $lombakuPeserta->sekolah_nama = $request->sekolah_nama;
        $lombakuPeserta->foto = $file_name;
        // $lombakuPeserta->akte = $file_name_akte;
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

        $lombaku = \App\Lombaku::find($request->lombaku);
        $lombaku->status =201;
        $lombaku->save();
        return redirect('/v2/myregister/'.$request->lombaku.'/confrimation')->with($data);
    }
    public function pieceCategory(Request $request){
        // $select = $request->get("select");
        $value = $request->get("value");
        $depandent = $request->get("depandent");
        $data = \App\LombaKategori::where('id',$value)->first();
        $output ='';
        if($data['song_type'] == 'pilihan'){
            $output = '<select class="form-control" id="song1" name="song1" required>';
            $output .= '<option value="">Select Piece '.$data['name'].'</option>';
            $output  .= '<option value="1">'.$data['song1'].'</option>';
            $output  .= '<option value="2">'.$data['song2'].'</option>';
            $output  .= '<option value="3">'.$data['song3'].'</option>';
            $output  .= '<option value="4">'.$data['song4'].'</option>';
            $output  .= '<option value="5">'.$data['song5'].'</option>';
            $output  .= '<option value="6">'.$data['song6'].'</option>';
            $output  .= '<option value="7">'.$data['song7'].'</option>';
            $output  .= '<option value="8">'.$data['song8'].'</option>';
            $output  .= '<option value="9">'.$data['song9'].'</option>';
            $output  .= '<option value="10">'.$data['song10'].'</option>';
            $output  .= '</select>';
            echo $output;
        }
        if($data['song_type']=='bebas'){
            for($i=1;$i<=$data['song_set'];$i++){
                $output = '<input type="text" class="form-control" name="song'.$i.'" id="song'.$i.'" placeholder="Input Piece '.$i.' '.$data['name'].'">';
                echo $output;
            }
            
        }
    }
    public function confrimPayment($lombaku_id){
        // $lombaku = \App\Lombaku::find($lombaku_id);
        $data['lombaku'] =\App\Lombaku::find($lombaku_id);
        $data['lombaku_peserta'] =\App\LombakuPeserta::where('lombaku_id',$lombaku_id)->get();
        // dd(count($data['lombaku_peserta']));
        
        if(count($data['lombaku_peserta']) < 1){
            return redirect('/v2/myregister/'.$data['lombaku']->lomba_id.'/create');
        }
        // if($lombaku->user_id == \Auth::user()->id){
            // $lombaku->total_biaya = ;
            // $lombaku->status = ;
        // }
        // dd($data);
        return view('v2.confrim-payment')->with($data);
    }
    public function deleteList($lombaku_pest){
        $lombaku_pest =\App\LombakuPeserta::find($lombaku_pest);
        $lombaku_pest->delete();
        return response("ok");
    }
    public function myregisterDelete($id){
        $data = \App\Lombaku::find($id);
        $data->delete();
        return response("deleted");
    }
    public function galleryCreate(){

        $data['lombas'] = \App\Lomba::where('status',1)->get();
        return view('v2.galleryCreate')->with($data);
    }
    public function ApiLombaKategori($id){
        try {
            $data = \App\LombaKategori::where('lomba_id',$id)->select('id','name')->get();
            return response()->json($data, 200);
        } catch (\Throwable $th) {
            return response()->json($th, 500);
        }
    }
    public function importLombaKategori(Request $request, $id, $lombaId){
        try {
            $dataLomba = \App\LombaKategori::where('lomba_id', $lombaId)->get();
            for ($i=0; $i < count($dataLomba); $i++) { 
                \DB::table('lomba_kategoris')->insert([
                    'lomba_id' => $id,
                    'name' => $dataLomba[$i]->name,
                    'min' => $dataLomba[$i]->min,
                    'max' => $dataLomba[$i]->max,
                    'biaya' => $dataLomba[$i]->biaya,
                    'song_type' => $dataLomba[$i]->song_type,
                    'song_set' => $dataLomba[$i]->song_set,
                    'song1' => $dataLomba[$i]->song1,
                    'song2' => $dataLomba[$i]->song2,
                    'song3' => $dataLomba[$i]->song3,
                    'song4' => $dataLomba[$i]->song4,
                    'song5' => $dataLomba[$i]->song5,
                    'song6' => $dataLomba[$i]->song6,
                    'song7' => $dataLomba[$i]->song7,
                    'song8' => $dataLomba[$i]->song8,
                    'song9' => $dataLomba[$i]->song9,
                    'song10' => $dataLomba[$i]->song10,
                    'song_set_final' => $dataLomba[$i]->song_set_final,
                    'song_type_final' => $dataLomba[$i]->song_type_final,
                    'song1_final' => $dataLomba[$i]->song1_final,
                    'song2_final' => $dataLomba[$i]->song2_final,
                    'song3_final' => $dataLomba[$i]->song3_final,
                    'song4_final' => $dataLomba[$i]->song4_final,
                    'song5_final' => $dataLomba[$i]->song5_final,
                    'song6_final' => $dataLomba[$i]->song6_final,
                    'song7_final' => $dataLomba[$i]->song7_final,
                    'song8_final' => $dataLomba[$i]->song8_final,
                    'song9_final' => $dataLomba[$i]->song9_final,
                    'song10_final' => $dataLomba[$i]->song10_final,
                ]);
            }
            $status = 'Success';
            return response()->json($status, 200);
        } catch (\Throwable $th) {
            $status = $th;
            return response()->json($status, 500);
        }
        
        
    }
    public function apiKategori(Request $request){
        $data = \App\LombaKategori::where('lomba_id',$request->lomba_id)->select('id','name')->get();
        $html = "";
        $option = "";
        for ($i=0; $i < count($data) ; $i++) { 
            $option .= '<option value="'.$data[$i]->id.'">'.$data[$i]->name.'</option>';
        }
        
        $html = '
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Type</label>
                    <div class="col-sm-12 col-md-8">
                    <select name="type" id="type" class="form-control selectric">
                        <option value="">-- Select Kategori --</option>
                        '.$option.'
                    </select>
                    </div>
                </div>    
                ';
        echo $html;
    }
    public function ambilUndian($lomba_id,$pesertaId){
        $lombaku = \App\Lombaku::find($lomba_id);
        $peserta = \App\LombakuPeserta::find($pesertaId);
        $peserta_lomba = \App\LombakuPeserta::where('kategori_id', $peserta->kategori_id)->get();
        $peserta_lomba_ok = \App\LombakuPeserta::where('kategori_id', $peserta->kategori_id)->whereNotNull('no_undian')->get();
        $no_undian = [];
        $no_undian_kosong = [];

        foreach($peserta_lomba_ok as $x){
            if($x->no_undian != null){
                array_push($no_undian, $x->no_undian);
            }
        }
        sort($no_undian);


        for($i=1; $i<=sizeof($peserta_lomba); $i++){
            array_push($no_undian_kosong, $i);
        }

        foreach($no_undian as $x){
            if (($key = array_search($x, $no_undian_kosong)) !== false) {
                unset($no_undian_kosong[$key]);
                $no_undian_kosong = array_values($no_undian_kosong);
            }
        }

        // return $no_undian_kosong[0];

        // if(sizeof($no_undian) != 0){
        //     for($i=0; $i<sizeof($peserta_lomba); $i++){
        //         if($i != array_shift($no_undian)){
        //             array_push($no_undian_kosong, $i+1);
        //         }
        //     }
        // } else {
        //     for($i=0; $i<sizeof($peserta_lomba); $i++){

        //         array_push($no_undian_kosong, $i+1);

        //     }
        // }


        if(sizeof($no_undian_kosong) == 1){
            $undian = $no_undian_kosong[0];
        }else {
            $undian = $no_undian_kosong[rand(0,sizeof($no_undian_kosong)-1)];
        }
        // return $no_undian_kosong;

        $peserta->no_undian = $undian;
        $peserta->save();

        return $peserta;
    }
    public function pembayaran($lombaku_id){
        $data['lombaku'] =\App\Lombaku::find($lombaku_id);
        $data['lombaku_peserta'] =\App\LombakuPeserta::where('lombaku_id',$lombaku_id)->get();
        // $data['wa'] = \App\ChatWhatsapp::where('lombaku_id',$lombaku_id)->orderBy('updated_at','Asc')->limit(1)->get();
        if($data['lombaku']->total_biaya != 200 || $data['lombaku']->total_biaya != 202){
            $data['lombaku']->total_biaya = $data['lombaku_peserta']->sum('biaya')+rand(111,999);
            $data['lombaku']->save();
        } 
        return view('v2.purcase')->with($data);
    }
    public function paid(Request $request,$lombaku_id){
        $data['lombaku'] =\App\Lombaku::find($lombaku_id);
        $data['lombaku_peserta'] =\App\LombakuPeserta::where('lombaku_id',$lombaku_id)->get();
        if($data['lombaku']->user_id == \Auth::user()->id){
            $data['lombaku']->tanggal_bayar = $request->tgl_transfer;
            $data['lombaku']->nama_bayar = $request->nama;
            $data['lombaku']->bank_bayar = $request->bank;
            $data['lombaku']->status = 202;
            $data['lombaku']->save();
        }
        return view('v2.purcase')->with($data);
    }

    public function contentCreate(){
        return view('v2.newsCreate');
    }
    public function destroyContent($id){
        $data = \App\Article::find($id);
        $data->delete();
        return redirect()->back();
    }
    public function contentPusblish(Request $request){
        if($request->type == 'info'){
            $content = new \App\Article;
            $content->author_id = \Auth::user()->id;
            $content->title = $request->title;
            $content->type = $request->type;

            if($content->save()){
                return redirect()->back()->with(['success' => strtoupper($request->type).' SAVED !']);
            }else{
                return redirect()->back()->with(['wrong' => strtoupper($request->type).' UNSAVED !']);
            }
        }else{
            
            $url = Uuid::generate();
            $att = new \App\Attachment;
            $file_name= "";
            $file_size="";
            if(Input::hasFile('file')){
                $file = Input::file('file');
                // prevent possible upsizing
                $file_name = $url.".".$file->getClientOriginalExtension();
                $file_size = filesize($file);
                $path_file = public_path('uploads/news/' . $file_name);
                // $file->move('uploads', $file_name);
                $imgCreate = Image::make($file->getRealPath());
                $imgCreate->resize(null, 1000, function ($constraint) {
                    $constraint->aspectRatio();
                    $constraint->upsize();
                })->save($path_file);
                $att->name = $file_name;
                $att->size = $file_size;
                $att->type = "IMAGE";
            }
            $att->save();
    
            $content = new \App\Article;
            $content->author_id = \Auth::user()->id;
            $content->attach_id = $att->id;
            $content->title = $request->title;
            $content->content = $request->content;
            $content->type = $request->type;
            $content->randuri = $url;
            $content->viewed = 50;
            
            if($content->save()){
                return redirect()->back()->with(['success' => strtoupper($request->type).' SAVED !']);
            }else{
                return redirect()->back()->with(['wrong' => strtoupper($request->type).' UNSAVED !']);
            }
           
        }

    }
    public function contentRePusblish(Request $request, $id){
        // dd($request);

       $att = null;
       $url = Uuid::generate();
        if(Input::hasFile('file')){
            $att = new \App\Attachment;
            $file = Input::file('file');
            // prevent possible upsizing
            $file_name = $url.".".$file->getClientOriginalExtension();
            $file_size = filesize($file);
            $path_file = public_path('uploads/news/' . $file_name);
            // $file->move('uploads', $file_name);
            $imgCreate = Image::make($file->getRealPath());
            $imgCreate->resize(null, 1000, function ($constraint) {
                $constraint->aspectRatio();
                $constraint->upsize();
            })->save($path_file);
            $att->name = $file_name;
            $att->size = $file_size;
            $att->type = "IMAGE";
            $att->save();
        }
        

        $content = \App\Article::find($id);
        // $content->author_id = \Auth::user()->id;
        if($att != null){
            $content->attach_id = $att->id;
        }
        $content->title = $request->title;
        $content->content = $request->content;
        $content->randuri = $request->url;
        
        if($content->save()){
            return redirect()->back()->with(['success' => strtoupper($request->type).' SAVED !']);
        }else{
            return redirect()->back()->with(['wrong' => strtoupper($request->type).' UNSAVED !']);
        }
    }

    public function myregister()
    {
        return view('v2.myregister');
    }
    public function myregisterShow($id){
        $data['peserta'] = \App\LombakuPeserta::where('lombaku_id',$id)->get();
        $data['no'] =1;
        return view('v2.myregisterShow')->with($data);
    }
    public function questionCreate(Request $request){
        $uuid = Uuid::generate();
        $data= new \App\Article;
        $data->author_id = \Auth::user()->id;
        $data->title = $request->wa;
        $data->content = $request->quest;
        $data->randuri = $uuid;
        $data->viewed = 0;
        $data->type = 'quest';
        $data->save();
        echo "success";
    }
}