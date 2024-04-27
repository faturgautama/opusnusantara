<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
use DB;
use Exporter;
use Excel;


class OrganizerLombaDownload extends Controller
{

    public function bukuacara_view($id){

        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.bukuacara')->with('data',$data);

    }

    public function ppt_semifinal($id){
        $data['lomba'] = \App\Lomba::find($id);
        $data['kategori'] = \App\LombaKategori::where('lomba_id', $data['lomba']->id)->get();
        $pdf = PDF::loadView('pdf.powerpoint1', $data)->setPaper('a4', 'landscape')->setWarnings(false);

        // return $pdf->download('powerpoint1.pdf');
        return view('pdf.powerpoint1')->with($data);
    }
    public function ppt_final($id){
        $data['lomba'] = \App\Lomba::find($id);
        $data['kategori'] = \App\LombaKategori::where('lomba_id', $data['lomba']->id)->get();
        $pdf = PDF::loadView('pdf.powerpoint2', $data)->setPaper('a4', 'landscape')->setWarnings(false);

        // return $pdf->download('powerpoint1.pdf');
        return view('pdf.powerpoint2')->with($data);
    }

    public function bukuacara_download(Request $request, $id){
        $data['lomba'] = \App\Lomba::find($id);
        $data['kategori'] = \App\LombaKategori::find($request->kategori_id);
        $data['tipe_penilaian'] = $request->tipe_penilaian;
        // dd($request);
        if($request->kategori_id == 'all'){
            $data['kat'] = \App\LombaKategori::where('lomba_id', $id)->get();
            // dd($data['kat']);
            if($request->output == 'pdf'){
                $pdf = PDF::loadView('pdf.bukuacara_all', $data)->setPaper('a4', 'landscape')->setWarnings(false);

                return $pdf->download('bukuacara_all.pdf');
                // return view('pdf.bukuacara_all');
            }

            if($request->output == 'xlsx'){
                return \Excel::download(new \App\Exports\bukuAcaraAll_xls ($data), 'Buku Acara All.xlsx');
            }
        }

        if($request->output == 'pdf'){
            $pdf = PDF::loadView('pdf.bukuacara', $data)->setPaper('a4', 'landscape')->setWarnings(false);

            return $pdf->download($data['kategori']->name.'.pdf');
        }

        if($request->output == 'xlsx'){
          return \Excel::download(new \App\Exports\bukuAcara_xls ($data), 'Buku Acara '.$data['kategori']->name.'.xlsx');
        }

    }

    public function bukuacara_xlsx($data){

    }

    public function bukuacara_pdf($data){

    }

    public function guidebook_view($id){

        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.guidebook')->with('data',$data);

    }

    public function guidebook_proses(Request $request,$id){

        $data['lomba'] = \App\Lomba::find($id);
        $data['kategori'] = \App\LombaKategori::find($request->kategori_id);

        $pdf = PDF::loadView('pdf.guidebook', $data)->setPaper('a4', 'portrait')->setWarnings(false);
        // dd($request);
        return $pdf->download($data['kategori']->name.'.pdf');
            return view('pdf.guidebook')->with($data);
    }

    public function sertifikatkpp2019($id){
        $data['lomba'] = \App\Lomba::find($id);
        $data['kategori'] = \App\LombaKategori::where('lomba_id', $data['lomba']->id)->get();
        $pdf = PDF::loadView('pdf.sertifikatkpp2019', $data)->setPaper('a4', 'landscape')->setWarnings(false);
        // return $pdf->download('sertifikatkpp2019.pdf');
        return view('pdf.sertifikatkpp2019')->with($data);
    }

    public function rekap_view($id){

        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.rekap')->with('data',$data);

    }

    public function rekap_proses(Request $request, $id){

        $data['lomba'] = \App\Lomba::find($id);
        $data['kategori'] = \App\LombaKategori::find($request->kategori_id);
        // dd($request);
        //kalau all kategori
        if($request->kategori_id == 'all'){
            if($request->output == 'pdf'){
                $pdf = PDF::loadView('pdf.rekap_all', $data)->setPaper('a4', 'landscape')->setWarnings(false);

                return $pdf->download('rekap_all.pdf');
                // retuern view('pdf.rekap_all')->with($data);
            }

            if($request->output == 'xlsx'){
                return \Excel::download(new \App\Exports\rekapPendaftaran_xls ($data), 'Rekap Pendaftaran '.$data['lomba']->name.'.xlsx');
            }
        }

        if($request->output == 'pdf'){
            $pdf = PDF::loadView('pdf.rekap_daftar', $data)->setPaper('a4', 'landscape')->setWarnings(false);

            return $pdf->download('Rekap Pendaftaran '.$data['kategori']->name. ' '.$data['lomba']->name.'.pdf');
        }

        if($request->output == 'xlsx'){
            return \Excel::download(new \App\Exports\rekapPendaftaranNotAll_xls ($data), 'Rekap Pendaftaran  '.$data['kategori']->name. ' '.$data['lomba']->name.'.xlsx');
          }
    }

    public function rekap_peserta_view($id){

        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.rekap_peserta')->with('data',$data);

    }

    public function rekap_peserta_proses(Request $request, $id){

        $data['lomba'] = \App\Lomba::find($id);
        // dd($request);
        //kalau all kategori
        if($request->kategori_id == 'all'){
            //$data['kategori'] = \App\LombaKategori::where('lomba_id',$id)->get();
            if($request->output == 'pdf'){
                $pdf = PDF::loadView('pdf.rekap_peserta_all', $data)->setPaper('a4', 'landscape')->setWarnings(false);

                return $pdf->download('rekap_peserta_all.pdf');
            }

            if($request->output == 'xlsx'){
                  return \Excel::download(new \App\Exports\rekapPeserta_xls ($data), 'Rekap Peserta '.$data['lomba']->name.'.xlsx');

            }
        }

        //kalau kategori sendiri-sendiri
        // $data['kategori'] = \App\LombaKategori::find($request->kategori_id);

        // if($request->output == 'pdf'){
        //     $pdf = PDF::loadView('pdf.rekap', sertifikatkpp2019$data)->setPaper('a4', 'landscape')->setWarnings(false);

        //     return $pdf->download($data['kategori']->name.'.pdf');
        // }

        // if($request->output == 'xlsx'){

        // }

    }

    public function komentar_view($id){

        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.komentar')->with('data',$data);

    }

    public function komentar_proses(Request $request, $id){
        $data['lomba'] = \App\Lomba::find($id);
        $data['kategori'] = \App\LombaKategori::find($request->kategori_id);
        $data['keterangan'] = $request->keterangan;
        $data['tipe_penilaian'] = $request->tipe_penilaian;

        if($request->kategori_id == 'all'){
            $data['kat'] = \App\LombaKategori::where('lomba_id', $id)->get();
            // dd($data['kat']);
            if($request->output == 'pdf'){
                $pdf = PDF::loadView('pdf.komentar_all', $data)->setPaper('a4', 'landscape')->setWarnings(false);
                // return view('pdf.komentar_all')->with($data);
                return $pdf->download('komentar_all.pdf');
            }


        }

        if($request->output == 'pdf'){
            $pdf = PDF::loadView('pdf.komentar_juri', $data)->setPaper('a4', 'landscape')->setWarnings(false);

            return $pdf->download($data['kategori']->name.'.pdf');
            // return view('pdf.komentar_juri')->with($data);
        }



    }

    public function penilaian_view($id){

        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.penilaian')->with('data',$data);

    }

    public function penilaian_proses(Request $request, $id){
        $pesertas = \App\LombakuPeserta::where('kategori_id', $request->kategori_id)->get();
        // dd($pesertas);
        for ($i = 0; $i < sizeof($pesertas); $i++) {
            $peserta = \App\LombakuPeserta::find($pesertas[$i]->id);
            // echo 'tes';
            // echo $peserta->nilai2;
            // dd($peserta);
            $nilai_count = 0;
            
            if ($peserta->nilai1 != null) {
                $nilai_count++;
            }
            if ($peserta->nilai2 != null) {
                $nilai_count++;
            }
            if ($peserta->nilai3 != null) {
                $nilai_count++;
            }
            if ($peserta->nilai4 != null) {
                $nilai_count++;
            }
            if ($peserta->nilai5 != null) {
                $nilai_count++;
            }
            if ($peserta->nilai6 != null) {
                $nilai_count++;
            }

            if ($nilai_count == null || $nilai_count == 0) {
                $nilai_count = 1;
            }
            // dd($request);

            $rata2 = ($peserta->nilai1 + $peserta->nilai2 + $peserta->nilai3 + $peserta->nilai4 + $peserta->nilai5 + $peserta->nilai6) / $nilai_count;
            $peserta->ratarata = $rata2;
            // $peserta->juara =$juara[$i];
            $peserta->save();
        }

        // echo $id;
        $data['lomba'] = \App\Lomba::find($id);
        // echo $data['lomba'];
        $data['kategori'] = \App\LombaKategori::find($request->kategori_id);
        // echo $data['kategori'];
        $data['order_by'] =$request->order_by;
        // echo $data['order_by'];
        $data['tipe_penilaian'] = $request->tipe_penilaian;
        // echo $data['tipe_penilaian'];
        $data['kategori_id'] = $request->kategori_id;
        // echo $data['kategori_id'];
        // dd($request->toArray());
        if($data['lomba']->tipe_lomba == 'semifinal'){

            if($request->tipe_penilaian=='semifinal'){
                return view('organizer.download.penilaian_proses_semifinal')->with($data);
            }

            return view('organizer.download.penilaian_proses_final')->with($data);
        }
        // dd($data['kategori']);
        // dd($request->toArray());
        return view('organizer.download.penilaian_proses')->with($data);
    }

    public function penilaian_simpan(Request $request, $id){
      // $penilaian = \App\LombakuPeserta::find($id);
        $kategori = \App\LombaKategori::find($request->kategori_id);
        $lomba =  \App\Lomba::find($kategori->lomba_id);
        // dd($lomba->tipe_lomba);
        if($lomba->tipe_lomba == 'semifinal'){

            if($request->tipe_penilaian=='semifinal'){
                //SEMIFINAL
                $peserta_id = $request->id;
                $nilai1 = $request->nilai1;
                $nilai2 = $request->nilai2;
                $nilai3 = $request->nilai3;
                $nilai4 = $request->nilai4;
                $nilai5 = $request->nilai5;
                $nilai6 = $request->nilai6;
                $juara = $request->juara;

                for ($i=0; $i <sizeof($peserta_id) ; $i++) {
                    $peserta = \App\LombakuPeserta::find($peserta_id[$i]);
                    $nilai_count = 0;
                    $peserta->nilai1 = $nilai1[$i];
                    $peserta->nilai2 = $nilai2[$i];
                    $peserta->nilai3 = $nilai3[$i];
                    $peserta->nilai4 = $nilai4[$i];
                    $peserta->nilai5 = $nilai5[$i];
                    $peserta->nilai6 = $nilai6[$i];
                    if($peserta->nilai1 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai2 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai3 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai4 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai5 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai6 != null){
                        $nilai_count++;
                    }
                    if($nilai_count == null || $nilai_count == 0){
                        $nilai_count = 1;
                    }


                    // dd($nilai_count);
                    // dd($nilai_count);
                    $rata2 = ($peserta->nilai1 + $peserta->nilai2 + $peserta->nilai3 + $peserta->nilai4 + $peserta->nilai5 + $peserta->nilai6)/$nilai_count;
                    $peserta->ratarata = $rata2;
                    $peserta->juara = $juara[$i];
                    $peserta->save();
                }

                return redirect('/organizer/lomba/'.$id.'/download/penilaian/list/?tipe_penilaian=semifinal&kategori_id='.$request->kategori_id);
            }

            //FINAL


                $peserta_id = $request->id;
                $nilai_final_1 = $request->nilai_final_1;
                $nilai_final_2 = $request->nilai_final_2;
                $nilai_final_3 = $request->nilai_final_3;
                $nilai_final_4 = $request->nilai_final_4;
                $nilai_final_5 = $request->nilai_final_5;
                $nilai_final_6 = $request->nilai_final_6;
                $juara_final = $request->juara_final;

                for ($i=0; $i <sizeof($peserta_id) ; $i++) {
                    $peserta = \App\LombakuPeserta::find($peserta_id[$i]);
                    $nilai_count = 0;
                    $peserta->nilai_final_1 = $nilai_final_1[$i];
                    $peserta->nilai_final_2 = $nilai_final_2[$i];
                    $peserta->nilai_final_3 = $nilai_final_3[$i];
                    $peserta->nilai_final_4 = $nilai_final_4[$i];
                    $peserta->nilai_final_5 = $nilai_final_5[$i];
                    $peserta->nilai_final_6 = $nilai_final_6[$i];
                    if($peserta->nilai_final_1 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai_final_2 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai_final_3 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai_final_4 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai_final_5 != null){
                        $nilai_count++;
                    }
                    if($peserta->nilai_final_6 != null){
                        $nilai_count++;
                    }
                    if($nilai_count == null || $nilai_count == 0){
                        $nilai_count = 1;
                    }
                    
                    $rata2_final = ($peserta->nilai_final_1 + $peserta->nilai_final_2 + $peserta->nilai_final_3 + $peserta->nilai_final_4 + $peserta->nilai_final_5 + $peserta->nilai_final_6)/$nilai_count;
                    $peserta->rata2_final = $rata2_final;
                    $peserta->juara_final = $juara_final[$i];
                    $peserta->save();
                }

                return redirect('/organizer/lomba/'.$id.'/download/penilaian/list/?tipe_penilaian=final&kategori_id='.$request->kategori_id);

        }

        $peserta_id = $request->id;
        $nilai1 = $request->nilai1;
        $nilai2 = $request->nilai2;
        $nilai3 = $request->nilai3;
        $juara = $request->juara;

        for ($i=0; $i <sizeof($peserta_id) ; $i++) {
            $peserta = \App\LombakuPeserta::find($peserta_id[$i]);
            $nilai_count = 0;
            if($peserta->nilai1 != null){
                $nilai_count++;
            }
            if($peserta->nilai2 != null){
                $nilai_count++;
            }
            if($peserta->nilai3 != null){
                $nilai_count++;
            }
            if($nilai_count == null || $nilai_count == 0){
                $nilai_count = 1;
            }
            $peserta->nilai1 = $nilai1[$i];
            $peserta->nilai2 = $nilai2[$i];
            $peserta->nilai3 = $nilai3[$i];
            $rata2 = ($peserta->nilai1 + $peserta->nilai2 + $peserta->nilai3)/$nilai_count;
            $peserta->ratarata = $rata2;
            $peserta->juara =$juara[$i];
            $peserta->save();
        }

        return redirect('/organizer/lomba/'.$id.'/download/penilaian/list/?kategori_id='.$request->kategori_id);
    }

    public function hasil_view($id){
        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.hasil')->with('data',$data);
    }

    public function hasil_proses(Request $request, $id){
      // $peserta = \App\LombakuPeserta::where('kategori_id', $request->id)->get();
      // dd($peserta);
      $data['lomba'] = \App\LombakuPeserta::find($id);
      $data['kategori'] = \App\LombaKategori::find($request->kategori_id);
      $data['bahasa'] = $request->bahasa;
      if($request->kategori_id == 'all'){
          $kategoris = \App\LombaKategori::where('lomba_id', $id)->get();
          // dd($kategoris);
          if($request->output == 'pdf'){
              $pdf = PDF::loadView('pdf.hasilkompetisi_all', compact('kategoris'))->setPaper('a4', 'landscape')->setWarnings(false);
              return $pdf->download('Hasil Kompetisi All.pdf');
          }

          if($request->output == 'xlsx'){
            // dd($kategoris);
            return \Excel::download(new \App\Exports\hasilKompetisiAll_xls (compact('kategoris')), 'Hasil Kompetisi All.xlsx');
          }
          if($request->output == 'html'){
            return view('pdf.hasilkompetisi_all')->with('kategoris', $kategoris);

          }
      }

      if($request->output == 'pdf'){
          $pdf = PDF::loadView('pdf.hasilkompetisi', $data)->setPaper('a4', 'portrait')->setWarnings(false);

          return $pdf->download('Hasil Kategori'.$data['kategori']->name.'.pdf');

      }
      if($request->output == 'html'){
        return view('pdf.hasilkompetisi')->with($data);

      }
        if($request->output == 'xlsx'){
          // return $lombaku;
        return \Excel::download(new \App\Exports\hasilExport_xls ($data), 'Hasil Kategori '.$data['kategori']->name.'.xlsx');
        }
    }

    public function powerpoint_view($id){
        $data['lomba'] = \App\Lomba::find($id);
        $data['lomba_id'] = $data['lomba']->id;
        return view('organizer.download.ppt')->with('data',$data);
    }

    public function powerpoint_proses(Request $request, $id){
        // $peserta = \App\LombakuPeserta::where('kategori_id', $request->id)->get();
        // dd($peserta);
        $lomba = \App\LombakuPeserta::find($id);
        $data['kategori'] = \App\LombaKategori::find($request->kategori_id);
        $kategoriall = \App\LombaKategori::where('lomba_id',$request->lomba_id);
        $data['tipe_lomba'] = $request->tipe_lomba;
        if($request->kategori_id == 'all'){
            $kategoris = \App\LombaKategori::where('lomba_id', $request->lomba_id)->get();

            if($request->output == 'html'){
                return view('pdf.powerpoint4')->with('kategoris', $kategoris);
            }
        }
        
        if($request->output == 'html'){
            return view('pdf.powerpoint_bali2019')->with($data);
        }
    }


    public function sertifikat_view($id){
        $data['lomba'] = \App\Lomba::find($id);
        return view('organizer.download.sertifikat')->with('data',$data);
    }
    public function sertifikat_proses(Request $request, $id){
        // $peserta = \App\LombakuPeserta::where('kategori_id', $request->id)->get();
        // dd($peserta);
        $data['lomba'] = \App\LombakuPeserta::find($id);
        $data['kategori'] = \App\LombaKategori::find($request->kategori_id);
        // dd($data['kategori']);
        if($request->kategori_id == 'all'){
            $kategori = \App\LombaKategori::where('lomba_id', $id)->get();
            // dd($kategoris);
            if($request->output == 'pdf'){
            if ($request->template == 't1') {
                $pdf = PDF::loadView('pdf.sertifikat_all', compact('kategori'))->setPaper('a4', 'landscape')->setWarnings(false);
                return $pdf->download('Sertifikat Peserta All.pdf');
            }
            if ($request->template == 't2') {
                $pdf = PDF::loadView('pdf.sertifikat_all', compact('kategori'))->setPaper('a4', 'landscape')->setWarnings(false);
                return $pdf->download('Sertifikat Peserta All.pdf');
            }
            }

            if($request->output == 'html'){
            if ($request->template == 't1') {
            return view('pdf.sertifikat_all')->with('kategori', $kategori);
            }
            if ($request->template == 't2') {
            return view('pdf.sertifikat_all')->with('kategori', $kategori);
            }

            }
        }

        if($request->output == 'pdf'){
        if ($request->template == 't1') {
            $pdf = PDF::loadView('pdf.sertifikat', $data)->setPaper('a4', 'landscape')->setWarnings(false);

            return $pdf->download('Sertifikat Kategori '.$data['kategori']->name.'.pdf');
        }
        if ($request->template == 't2') {
            $pdf = PDF::loadView('pdf.sertifikatkpp2019', $data)->setPaper('a4', 'landscape')->setWarnings(false);

            return $pdf->download('Sertifikat Kategori '.$data['kategori']->name.'.pdf');
        }
        if ($request->template == 't3') {
            $pdf = PDF::loadView('pdf.sertifikat_bali2019', $data)->setPaper('a4', 'landscape')->setWarnings(false);
            return $pdf->download('Sertifikat Kategori '.$data['kategori']->name.'.pdf');
        }

        }
        
        if($request->output == 'html'){
            if ($request->template == 't1') {
                return view('pdf.sertifikat')->with('kategori', $data['kategori']);
            }
            if ($request->template == 't2') {
                return view('pdf.sertifikatkpp2019')->with('kategori', $data['kategori']);
            }
            if ($request->template == 't3') {
                return view('pdf.sertifikat_bali2019')->with('kategori', $data['kategori']);
            }
            
        }
    }

}
