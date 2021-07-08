<?php

namespace App\Repositories;

use Illuminate\Http\Request;

use App\Models\Library\Book;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ValidateAndStoreUpload
{
  protected $path, $image_exist, $image_name, $pathAndName;

  public function __construct(Book $book)
  {
      $this->book = $book;
      $this->path = 'books';

      if ( request()->hasFile('file') && request()->file('file')->isValid() )
      {
        $this->image_exist = true;
        $this->image = request()->file('file');
        $this->image_name = Str::snake(trim($this->image->getClientOriginalName()));
        $this->pathAndName = $this->path.'/'.$this->image_name;
      }
  }

  public function uploadValidation()
  {
    if ( $this->image_exist )
    {
      /* == CONFIRM NO DUPICATE IN THE DB TBL == */
      $duplicate = Book::imageExists($this->image_name);

      /* == NEW RECORD: NEW UPLOAD == */
      if ( ! $duplicate )
      {
        /* == SAVE TO STORAGE == */
        $this->image->storeAs($this->path, $this->image_name);
      }
      /* == DUPLICATE EXISTS IN DB == */
      else
      {
        /* == CHECK IF THE SAME DB RECORD IS ATTEMPTING TO UPLOAD AN UPDATED FILE (ASSUMING AN UPDATE) == */
        if ( $this->book->file && $this->book->file === $this->image_name )
        {
          /* == REMOVE OLD IMAGE FROM THE FILE STORAGE == */
          $this->removeStoredUpload();

          /* == STORE FILE UPLOAD (ASSUMING AN UPDATE) == */
          $this->image->storeAs($this->path, $this->image_name);
        }

        /* == DUPLICATE EXISTS BUT NOT ASSOCIATED WITH "THIS" RECORD: WHEN UPDATE == */
        elseif ( $this->book->file && $this->book->file != $this->image_name )
        {
          $this->image_name = $this->book->file;
          /* == REMOVE OLD IMAGE FROM THE FILE STORAGE == */
          $this->removeStoredUpload();

          /* == SINCE THE IMAGE NAME ALREADY EXISTS, MAKE THE IMAGE NAME UNIQUE == */
          $this->image_name = uniqid() . '_' . $this->image_name;
          $this->image->storeAs($this->path, $this->image_name);
        }

        /* == CONFIRM IF THIS IS NEEDED: DUPLICATE EXISTS BUT NOT ASSOCIATED WITH "ANY" RECORD: WHEN STORE == */
        else
        {
          /* == RENAME IMAGE THEN STORE == */
          $this->image_name = uniqid() . '_' . $this->image_name;
          $this->image->storeAs($this->path, $this->image_name);
        }
      }
      return $this->image_name;
    }
    /* == NO FILE UPLOAD == */
    return '';
  }

  public function removeStoredUpload()
  {
    /* == CONFIRM THE IMAGE EXISTS IN THE LOCAL FILE STORAGE == */
    $exists = Storage::exists($this->pathAndName);

    /* == REMOVE IMAGE FROM THE LOCAL FILE STORAGE == */
    if( $exists ) Storage::delete($this->pathAndName);
  }

}
