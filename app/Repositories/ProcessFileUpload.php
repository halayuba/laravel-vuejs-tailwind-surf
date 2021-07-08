<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ProcessFileUpload
{

  protected $request, $path, $user;

  public function __construct(User $user)
  {
      $this->path = 'public/uploads';
      $this->user = $user;
  }

  public function validateAndStoreUpload()
  {
    if ( request()->hasFile('file') && request()->file('file')->isValid() )
    {
      $image = request()->file('file');
      $image_name = Str::snake(trim($image->getClientOriginalName()));
      $pathAndName = $this->path.'/'.$image_name;

      /* == CONFIRM NO DUPICATE IN THE DB TBL == */
      $duplicate = User::imageExists($image_name);

      /* == NO DUPLICATE: NEW UPLOAD == */
      if ( ! $duplicate )
      {
        /* == SAVE TO STORAGE == */
        $image->storeAs($this->path, $image_name);
      }
      /* == DUPLICATE EXISTS IN DB == */
      else
      {
        /* == CHECK IF THE SAME DB RECORD IS ATTEMPTING TO UPLOAD AN UPDATED FILE (NEW VERSION) == */
        if ( $this->user->file && $this->user->file === $image_name )
        {
          /* == REMOVE OLD IMAGE FROM THE FILE STORAGE == */
          $this->removeStoredUpload($image_name);

          /* == STORE FILE UPLOAD (ASSUMING AN UPDATE) == */
          $image->storeAs($this->path, $image_name);
        }

        /* == DUPLICATE EXISTS BUT NOT ASSOCIATED WITH "THIS" RECORD: WHEN UPDATE == */
        elseif ( $this->user->file && $this->user->file != $image_name )
        {
          /* == REMOVE OLD IMAGE FROM THE FILE STORAGE == */
          $this->removeStoredUpload($this->user->file);

          $image_name = uniqid() . '_' . $image_name;
          $image->storeAs($this->path, $image_name);
        }
        /* == DUPLICATE EXISTS BUT NOT ASSOCIATED WITH "ANY" RECORD: WHEN STORE == */        
        else
        {
          /* == RENAME IMAGE THEN STORE == */
          $image_name = uniqid() . '_' . $image_name;
          $image->storeAs($this->path, $image_name);
        }
      }
      return $image_name;
    }
    /* == NO FILE UPLOAD == */
    return '';
  }

  public function removeStoredUpload($file)
  {
    $pathAndName = $this->path.'/'.$file;

    /* == CONFIRM THE IMAGE EXISTS IN THE LOCAL FILE STORAGE == */
    $exists = Storage::exists($pathAndName);

    /* == REMOVE IMAGE FROM THE LOCAL FILE STORAGE == */
    if( $exists ) Storage::delete($pathAndName);
  }

}
