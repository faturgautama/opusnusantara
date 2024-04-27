<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;
class LombaGalleryController extends Controller
{
  public function show($id) {
    $images = Image::where('lomba_id',$id)->get();
    $lomba = \App\Lomba::find($id);
    $lomba->kategori = \App\LombaKategori::where('lomba_id', $id)->get();
    return view('lomba_gallery',compact('images', 'lomba'));
  }
}
