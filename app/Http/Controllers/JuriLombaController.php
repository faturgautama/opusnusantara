<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class JuriLombaController extends Controller
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
    public function show($id)
    {
        $lomba = \App\Lomba::find($id);

        // dd($lomba);
        return view('juri.lomba.show')->with('lomba', $lomba);
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
        //
    }

    public function nilai(Request $request, $id)
    {
        $lomba = \App\Lomba::find($id);
        $lomba->kategori_id = $request->kategori_id;
        // dd($lomba);
        $lomba['tipe_penilaian'] = $request->tipe_penilaian;

        if ($lomba->tipe_lomba == 'semifinal') {

            if ($request->tipe_penilaian == 'semifinal') {
                return view('juri.lomba.nilai_semifinal')->with('lomba', $lomba);
            }

            return view('juri.lomba.nilai_final')->with('lomba', $lomba);
        }
        return view('juri.lomba.nilai')->with('lomba', $lomba);
    }

    public function penilaian(Request $request, $id)
    {
        $lomba = \App\Lomba::find($id);
        $lomba->kategori_id = $request->kategori_id;
        $lomba->peserta_id = $request->peserta_id;
        // dd($lomba);
        return view('juri.lomba.penilaian')->with('lomba', $lomba);
    }

    public function simpan(Request $request, $id)
    {
        // DB::beginTransaction();
        // try{
            // dd($request);
            $kategori = \App\LombaKategori::find($request->kategori_id);
            $lomba =  \App\Lomba::find($kategori->lomba_id);
            $peserta_id = $request->id;
            // dd($request);

            if ($lomba->tipe_lomba == 'semifinal') {

                if ($request->tipe_penilaian == 'semifinal') {
                    //SEMIFINAL


                    $peserta_id = $request->id;
                    $nilai1 = $request->nilai1;
                    $nilai2 = $request->nilai2;
                    $nilai3 = $request->nilai3;
                    $nilai4 = $request->nilai4;
                    $nilai5 = $request->nilai5;
                    $nilai6 = $request->nilai6;
                    // $juara = $request->juara;
                    // dd($request);



                    for ($i = 0; $i < sizeof($peserta_id); $i++) {
                        $peserta = \App\LombakuPeserta::find($peserta_id[$i]);
                        $nilai_count = 0;
                        if ($request->nilai1 != null) {
                            $peserta->nilai1 = $nilai1[$i];
                            if ($peserta->nilai1 != null) {
                                $nilai_count++;
                            }
                        }
                        if ($request->nilai2 != null) {
                            $peserta->nilai2 = $nilai2[$i];
                            if ($peserta->nilai2 != null) {
                                $nilai_count++;
                            }
                        }
                        if ($request->nilai3 != null) {
                            $peserta->nilai3 = $nilai3[$i];
                            if ($peserta->nilai3 != null) {
                                $nilai_count++;
                            }
                        }
                        if ($request->nilai4 != null) {
                            $peserta->nilai4 = $nilai4[$i];
                            if ($peserta->nilai4 != null) {
                                $nilai_count++;
                            }
                        }
                        if ($request->nilai5 != null) {
                            $peserta->nilai5 = $nilai5[$i];
                            if ($peserta->nilai5 != null) {
                                $nilai_count++;
                            }
                        }
                        if ($request->nilai6 != null) {
                            $peserta->nilai6 = $nilai6[$i];
                            if ($peserta->nilai6 != null) {
                                $nilai_count++;
                            }
                        }

                        if ($nilai_count == null || $nilai_count == 0) {
                            $nilai_count = 1;
                        }
                        // dd($nilai_count);

                        $rata2 = ($peserta->nilai1 + $peserta->nilai2 + $peserta->nilai3 + $peserta->nilai4 + $peserta->nilai5 + $peserta->nilai6) / $nilai_count;
                        $peserta->ratarata = $rata2;
                        // $peserta->juara =$juara[$i];
                        $peserta->save();
                    }

                    // return redirect('/organizer/lomba/'.$id.'/download/penilaian/list/?kategori_id='.$request->kategori_id);

                    return redirect('/juri/lomba/' . $id . "/nilai/?tipe_penilaian=semifinal&kategori_id=" . $request->kategori_id);
                    // return 'final';
                }

                //FINAL

                $peserta_id = $request->id;
                $nilai1 = $request->nilai1;
                $nilai2 = $request->nilai2;
                $nilai3 = $request->nilai3;
                $nilai4 = $request->nilai4;
                $nilai5 = $request->nilai5;
                $nilai6 = $request->nilai6;
                // $juara = $request->juara;



                for ($i = 0; $i < sizeof($peserta_id); $i++) {
                    $peserta = \App\LombakuPeserta::find($peserta_id[$i]);
                    $nilai_count = 0;
                    if ($request->nilai1 != null && $request->nilai1 > 0) {
                        $peserta->nilai_final_1 = $nilai1[$i];
                        if ($peserta->nilai_final_1 != null) {
                            $nilai_count++;
                        }
                    }
                    if ($request->nilai2 != null && $request->nilai2 > 0) {
                        $peserta->nilai_final_2 = $nilai2[$i];
                        $nilai_count++;
                        if ($peserta->nilai_final_2 != null) {
                            $nilai_count++;
                        }
                    }
                    if ($request->nilai3 != null && $request->nilai3 > 0) {
                        $peserta->nilai_final_3 = $nilai3[$i];
                        if ($peserta->nilai_final_3 != null) {
                            $nilai_count++;
                        }
                    }
                    if ($request->nilai4 != null && $request->nilai4 > 0) {
                        $peserta->nilai_final_4 = $nilai4[$i];
                        if ($peserta->nilai_final_4 != null) {
                            $nilai_count++;
                        }
                    }
                    if ($request->nilai5 != null && $request->nilai5 > 0) {
                        $peserta->nilai_final_5 = $nilai5[$i];
                        if ($peserta->nilai_final_5 != null) {
                            $nilai_count++;
                        }
                    }
                    if ($request->nilai6 != null && $request->nilai6 > 0) {
                        $peserta->nilai_final_6 = $nilai6[$i];
                        if ($peserta->nilai_final_6 != null) {
                            $nilai_count++;
                        }
                    }
                    if ($nilai_count == null || $nilai_count == 0) {
                        $nilai_count = 1;
                    }

                    $rata2 = ($peserta->nilai_final_1 + $peserta->nilai_final_2 + $peserta->nilai_final_3 + $peserta->nilai_final_4 + $peserta->nilai_final_5 + $peserta->nilai_final_6) / $nilai_count;
                    $peserta->rata2_final = $rata2;
                    // $peserta->juara =$juara[$i];
                    $peserta->save();
                }

                // return redirect('/organizer/lomba/'.$id.'/download/penilaian/list/?kategori_id='.$request->kategori_id);

                return redirect('/juri/lomba/' . $id . "/nilai/?tipe_penilaian=final&kategori_id=" . $request->kategori_id);
            }

            $peserta_id = $request->id;
            $nilai1 = $request->nilai1;
            $nilai2 = $request->nilai2;
            $nilai3 = $request->nilai3;
            $nilai4 = $request->nilai4;
            $nilai5 = $request->nilai5;
            $nilai6 = $request->nilai6;
            // $juara = $request->juara;
            // dd($request);



            for ($i = 0; $i < sizeof($peserta_id); $i++) {
                // $peserta = \App\LombakuPeserta::find($peserta_id[$i])->sharedLock();
                $peserta = \App\LombakuPeserta::find($peserta_id[$i]);
                $nilai_count = 0;
                // if ($request->nilai1 != null) {
                if ($nilai1[$i] != null) {
                    // echo 'tes';
                    $peserta->nilai1 = $nilai1[$i];
                    if ($peserta->nilai1 != null) {
                        $nilai_count++;
                    }
                }
                if ($nilai2[$i] != null) {
                    $peserta->nilai2 = $nilai2[$i];
                    if ($peserta->nilai2 != null) {
                        $nilai_count++;
                    }
                }
                if ($nilai3[$i] != null) {
                    $peserta->nilai3 = $nilai3[$i];
                    if ($peserta->nilai3 != null) {
                        $nilai_count++;
                    }
                }
                if ($nilai4[$i] != null) {
                    $peserta->nilai4 = $nilai4[$i];
                    if ($peserta->nilai4 != null) {
                        $nilai_count++;
                    }
                }
                if ($nilai5[$i] != null) {
                    $peserta->nilai5 = $nilai5[$i];
                    if ($peserta->nilai5 != null) {
                        $nilai_count++;
                    }
                }
                if ($nilai6[$i] != null) {
                    $peserta->nilai6 = $nilai6[$i];
                    if ($peserta->nilai6 != null) {
                        $nilai_count++;
                    }
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

            // DB::commit();
            // return redirect('/organizer/lomba/'.$id.'/download/penilaian/list/?kategori_id='.$request->kategori_id);

            return redirect('/juri/lomba/' . $id . "/nilai/?kategori_id=" . $request->kategori_id."&act=success");
        // } catch (\Exception $e) {
        //     DB::rollback();
            
        //     return response()->json(['error' => $e->getMessage()], 500);
        // }
    }
}
