<?php

namespace App\Http\Controllers;

use FontLib\Table\Type\name;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class LombakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('lombaku.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $lombaId = $request->lombaId;
        if ($lombaId == null) {
            return redirect('/');
        }

        $lomba = \App\Lomba::find($lombaId);
        return view('lombaku.add')->with('lomba', $lomba);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lombaku = new \App\Lombaku;
        $lombaku->user_id = \Auth::id();
        $lombaku->lomba_id = $request->lombaId;
        $lombaku->save();

        return redirect('/lombaku/' . $lombaku->id . '/peserta');
        // dd($request);
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

    public function showKonfirmasi($id)
    {
        $lomba = \App\Lombaku::find($id);
        if ($lomba->peserta->count() < 1) {
            return redirect('/lombaku/' . $id . '/peserta');
        }

        if ($lomba->metode_pembayaran != null) {
            return redirect('/lombaku/' . $id . '/pembayaran');
        }

        return view('lombaku.konfirmasi')->with('lomba', $lomba);
    }

    public function storeKonfirmasi(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $lomba = \App\Lombaku::find($id);
            $lomba->metode_pembayaran = 'Xendit';
            $biaya = $lomba->peserta->sum('biaya');
            $lomba->total_biaya = $biaya;
            $lomba->save();
            $paymentMethod = \App\PaymentMethod::where('status', true)->get();

            $invoiceData = [
                'external_id' => $lomba->external_id,
                'invoice_duration' => 14 * 24 * 60 * 60,
                'payer_email' => \Auth::user()->email,
                'payment_methods' => $paymentMethod->map(function ($paymentMethod) {
                    return $paymentMethod->code;
                }),
                'customer' => [
                    'given_names' => \Auth::user()->name,
                    'email' => \Auth::user()->email,
                    'mobile_number' => \Auth::user()->nohp,
                ],
                'amount' => $lomba->total_biaya,
                'description' => 'Payment for Lomba id ' . $lomba->lomba_id,
            ];

            $api_key = base64_encode(env('XENDIT_SECRET_KEY'));
            $headers = [
                'Content-Type' => 'application/json',
                'Authorization' => 'Basic ' . $api_key,
                'for-user-id' => env('XENDIT_FOR_USER_ID') ?? null,
                'with-split-rule' => env('XENDIT_WITH_SPLIT_RULE') ?? null,
            ];

            $data = [
                'name' => \Auth::user()->name,
                'biaya' => $lomba->total_biaya,
                'id' => $lomba->id,
            ];


            $client = new \GuzzleHttp\Client();
            $response = $client->request('POST', 'https://api.xendit.co/v2/invoices', [
                'headers' => $headers,
                'json' => $invoiceData,
            ]);
            $invoice = json_decode($response->getBody());
            $lomba->status_bayar = 'Pending';
            $lomba->payment_url = $invoice->invoice_url;
            $lomba->save();
            // \Mail::send('emails.konfirmasi', $data, function ($message) {

            //     $message->from('opusnusantara@gmail.com', 'Payment Confirmation');

            //     $message->to(\Auth::user()->email)->subject('Opus Nusantara');

            // });

            DB::commit();

            if ($lomba->peserta->count() < 1) {
                return redirect('/lombaku/' . $id . '/peserta');
            }

            if ($lomba->metode_pemabayaran != null) {
                return redirect('/lombaku/' . $id . '/pembayaran');
            }
        } catch (\Throwable $th) {
            DB::rollback();
            return Redirect::back()->withErrors(['msg' => 'Failed to create invoice. Please try again.']);
            // dd($th);
        }



        return redirect('/lombaku/' . $id . '/pembayaran');
    }

    public function showPembayaran($id)
    {
        $lomba = \App\Lombaku::find($id);
        if ($lomba->metode_pembayaran == null) {
            return redirect('/lombaku/' . $id . '/konfirmasi');
        }

        return view('lombaku.pembayaran')->with('lomba', $lomba);
    }

    public function savePembayaran(Request $request, $id)
    {
        $lomba = \App\Lombaku::find($id);
        if ($lomba->peserta->count() < 1) {
            return redirect('/lombaku/' . $id . '/peserta');
        }

        if ($lomba->metode_pemabayaran != null) {
            return redirect('/lombaku/' . $id . '/pembayaran');
        }

        $lomba->tanggal_bayar = $request->tanggal_transfer;
        $lomba->nama_bayar = $request->nama;
        $lomba->bank_bayar = $request->bank;
        $lomba->save();


        // $biaya = $lomba->peserta->sum('biaya');
        // $status = false;
        // while(!$status){
        //     $uniqueId = rand(5,999);
        //     $totalBiaya = $biaya + $uniqueId;
        //     if(!\App\Lombaku::where('total_biaya', $totalBiaya)->first()){
        //         $lomba->total_biaya = $totalBiaya;
        //         $lomba->save();
        //         $status = true;
        //     }
        // }



        return redirect('/lombaku/' . $id . '/pembayaran');
    }

    public function ambilUndian($lombaId, $pesertaId)
    {
        $lombaku = \App\Lombaku::find($lombaId);
        $peserta = \App\LombakuPeserta::find($pesertaId);
        $peserta_lomba = \App\LombakuPeserta::where('kategori_id', $peserta->kategori_id)->get();
        $peserta_lomba_ok = \App\LombakuPeserta::where('kategori_id', $peserta->kategori_id)->whereNotNull('no_undian')->get();
        $no_undian = [];
        $no_undian_kosong = [];

        foreach ($peserta_lomba_ok as $x) {
            if ($x->no_undian != null) {
                array_push($no_undian, $x->no_undian);
            }
        }
        sort($no_undian);


        for ($i = 1; $i <= sizeof($peserta_lomba); $i++) {
            array_push($no_undian_kosong, $i);
        }

        foreach ($no_undian as $x) {
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


        if (sizeof($no_undian_kosong) == 1) {
            $undian = $no_undian_kosong[0];
        } else {
            $undian = $no_undian_kosong[rand(0, sizeof($no_undian_kosong) - 1)];
        }
        // return $no_undian_kosong;

        $peserta->no_undian = $undian;
        $peserta->save();

        return $peserta;
    }

    public function callback(Request $request)
    {
        // check if the incoming request is valid using header x-callback-token and secret key
        $headers = $request->header();
        $callback_token = env('XENDIT_CALLBACK_TOKEN');
        if (!isset($headers['x-callback-token']) || $headers['x-callback-token'][0] != $callback_token) {
            return response()->json([
                'status' => 401,
                'message' => 'Unauthorized',
            ], 401);
        }

        $externalId = $request->external_id;
        $lomba = \App\Lombaku::where('external_id', $externalId)->first();

        // if already paid return 200, if there is no external id return 404
        if ($lomba == null) {
            return response()->json([
                'status' => 404,
                'message' => 'Exteral Id Not Found',
            ], 404);
        } else if ($lomba->status == 200) {
            return response()->json([
                'status' => 200,
                'message' => 'Already Paid',
            ]);
        }

        if ($request->status == 'PAID') {
            $lomba->status_bayar = 'Lunas';
            $lomba->status = 200;
            $lomba->tanggal_bayar = $request->paid_at;
            $lomba->bank_bayar = $request->payment_channel;
            $lomba->nama_bayar = $request->payer_email;
            $lomba->jam_bayar = substr($request->paid_at, 11, 5);
            $lomba->metode_pembayaran = $request->payment_channel;
            $lomba->xendit_payment_id = $request->id;
            $lomba->save();

            return response()->json([
                'status' => 200,
                'message' => 'Success',
                'data' => $lomba
            ]);
        }

        $lomba->save();
    }
}
