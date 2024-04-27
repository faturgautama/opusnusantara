<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\User;
use Mail;

class OrganizerLombakuController extends Controller
{
    private $user_email;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lombaku = \App\Lombaku::find($id);
        dd($lombaku);
        return view('organizer.lombaku.edit')->with('lombaku', $lombaku);
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
        $lombaku = \App\Lombaku::find($id);
        // dd($lombaku);
        return view('organizer.lombaku.show')->with('lombaku', $lombaku);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function edit($lombaId, $id)
    {
        $lombaku = \App\Lombaku::find($id);
        dd($lombaku);
        return view('organizer.peserta.edit')->with('lombaku', $lombaku);
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

    public function confirm($lombaId, $id){

        $lombaku = \App\Lombaku::find($id);
        $lombaku->status = 200;
        $lombaku->save();
        $lomba = \App\Lomba::find($lombaku->lomba_id);
        $user = User::find($lombaku->user_id);
        // dd($user);
        // return response($lomba);
        $data = array(
            'name' => $user['name'],
            'lomba' => $lomba['name'],
            'id' => ""
        );

        // return view('emails.terbayar')->with('user',$user);

        \Mail::send('emails.terbayar', $data, function ($message) use ($user) {
            
            $message->from('opusnusantara@gmail.com', 'Payment Confirmed');
    
            $message->to($user->email)->subject('Opus Nusantara');
    
        });

        return 'ok';
    }

    public function delete($lombaId, $id){

        $lombaku = \App\Lombaku::find($id);

        $lombaku->delete();

        return 'ok';
    }
}
