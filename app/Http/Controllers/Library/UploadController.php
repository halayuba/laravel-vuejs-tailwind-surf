<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Library\Upload;
use Illuminate\Support\Facades\Storage;

class UploadController extends Controller
{
  public function store(Request $request)
  {
    if(count($request->images)) {
      foreach ($request->images as $image) {
        $image->store('images');
      }
    }
    // /Log::info($request->file);
    // $image = $request->file;
    // $image->store('images');

    return response()->json(['message' => 'Upload is completed' ]);
  }

   //== File upload with Laravel and VueJS: Arthur Henrique
  //====================
  public function index() {
    $uploads = Upload::all();
    return response()->json($uploads);
    // return view('files.index', compact('files'));
  }

   //== File upload with Laravel and VueJS: Arthur Henrique
  //====================
  public function uploadFile(Request $request) {
    $file = Input::file('file');
    $filename = $file->getClientOriginalName();

    $path = hash( 'sha256', time());

    if(Storage::disk('images')->put($path.'/'.$filename, File::get($file))) {
        $input['filename'] = $filename;
        $input['mime'] = $file->getClientMimeType();
        $input['path'] = $path;
        $input['size'] = $file->getClientSize();

        $upload = Upload::create($input);

        return response()->json([
            'success' => true,
            'id' => $upload->id
        ], 200);
    }
    return response()->json([
        'success' => false
    ], 500);
  }


}
