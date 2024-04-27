<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Image;

class OrganizerImagesController extends Controller
{
  /**
  * @method: GET
  *
  * @return Render view for uploads images
  */
  public function show(){
    return view('organizer.gallery.index');
  }

  public function index($id) {
    $images = Image::get();
    $lomba = \App\Lomba::find($id);
    $lomba->kategori = \App\LombaKategori::where('lomba_id', $id)->get();
    return view('organizer.gallery.lomba.show',compact('images', 'lomba'));
  }

  /**
  * Method : POST
  *
  * @return Post image and store in database
  */
  public function storeImage(Request $request){
    if($request->file('file') && $request->file('file')->isValid()){
      $lombaId = $request->lombaId;
      $imageName = str_random(12).'.'.$request->file('file')->getClientOriginalExtension();
      $imageModel = new Image;
      $imageModel->image = $imageName;
      $imageModel->caption = pathinfo($request->file('file')->getClientOriginalName(), PATHINFO_FILENAME);
      $imageModel->lomba_id = $lombaId;
      $request->file('file')->move(public_path() . '/uploads', $imageName);
      if($imageModel->save()){
        return redirect()->back();
      }
    }
  }

  /**
  * Method : GET
  *
  * @return return all images
  */
  public function allImages(){
    $images = Image::get();

  return view('organizer.gallery.lomba.show', compact('images'))->render();
  }

  /**
  * Method : DELETE
  *
  * @return delete images
  */
  public function deleteImage($id) {
    $image = Image::findOrFail($id);


          $file = public_path() . '/uploads/'.$image->image;
          if(is_file($file)){
              @unlink($file);
          }
          $image->delete();

      // $images = Image::get();
  return redirect()->back();

  }
  public function deleteImages(Request $request) {
  //       $image = Image::whereIn('lomba_id', $request->lombaId);
  //         $file = public_path() . '/uploads/'.$image->image;
  //         if(is_file($file)){
  //             @unlink($file);
  //         }
  //         $image->destroy();
  //
  //     // $images = Image::get();
   return redirect()->back();

  }
}
