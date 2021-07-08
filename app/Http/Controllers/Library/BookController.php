<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Library\{Book, Subject};
use App\Http\Resources\Library\BookResource;
use Illuminate\Support\Facades\Storage;
use App\Repositories\ValidateAndStoreUpload;
use Illuminate\Support\Facades\Log;

class BookController extends Controller
{
  protected $upload;
  // protected $path, $has_image, $image, $image_name;

  public function __construct(ValidateAndStoreUpload $upload)
  {
    /*
    $this->path = 'public/uploads';
    $this->image = request()->file('file');
    $this->has_image = (request()->hasFile('file') && $this->image->isValid())? true : false;
    $this->image_name = $this->has_image? snake_case($this->image->getClientOriginalName()) : '';
    */
    $this->upload = $upload;
  }

  /* //====================
    //== LANDING
   //==================== */
   public function landing(Request $request)
   {
     return view("library.landing");
   }

  /* //====================
    //== INDEX
   //==================== */
  public function index()
  {
      return BookResource::collection(
        Book::ordered()->get()
      );
  }

  /* //====================
    //== STORE
   //==================== */
  public function store(Request $request)
  {

    // Log::channel('openeyes')
    //        ->info('Request include: ', [
    //          'req' => $request->all()
    //        ]);

    request()->validate([
      'title' => 'required|min:5',
      'author' => 'required|min:5',
      'subjects' => 'required',
    ]);

     //== VALIDATION: DUPLICATE TITLE
    //====================
    if ( Book::isDuplicate($request->title)->count() > 0 )
    {
      return response()->json([
        'status' => 422,
        'success' => false,
        'message' => 'Duplicate book title. This book may already exist.'
      ]);
    }
    else
    {
      /* == USE REPOSITORY FOR VAIDATING AND STORING IMAGE == */
      $image_name = $this->upload->uploadValidation($request);

       //== SAVE TO DB
      //====================
      $new_book = Book::create([
        'title' => $request->title,
        'author' => $request->author,
        'publish_date' => $request->publish_date,
        'pages' => $request->pages,
        'priority' => $request->priority,
        'url' => $request->url,
        'file' => $image_name,
      ]);

       //== ASSOCIATE SUBJECTS FOR THIS BOOK
      //====================
      $subjects = explode(',', $request->subjects);
      $new_book->subjects()->attach($subjects);

      return new BookResource($new_book);
    }

  }

  /* //====================
    //== SHOW
   //==================== */
  public function show(Book $book)
  {
    return new BookResource($book);
  }

  /* //====================
    //== UPDATE
   //==================== */
  public function update(Request $request, Book $book)
  {
      $status = request()->validate([
        'title' => 'required|min:5|unique:books,title,' . $book->id,
        'author' => 'required|min:5',
      ], ['title.unique' => 'Your attempt to update this book is rejected since the title already exists in the database!']);

      /* == GRAB THE CURRENT FILE NAME (LOGO) IF EXISTS == */
      $current_image_name = $book->file;

      /* == USE REPOSITORY FOR VAIDATING AND STORING IMAGE == */
      $image_name = $this->upload->uploadValidation($request, $book);

      /* == ASSUMING NO FILE UPLOAD (NO UPDATE WAS NEEDED FOR THE LOGO) == */
      $image_name = ! empty($image_name)?: $current_image_name;

      //== SAVE TO DB
     //====================
      $status = $book->update([
        'title' => $request->title,
        'author' => $request->author,
        'publish_date' => $request->publish_date,
        'pages' => $request->pages,
        'priority' => $request->priority,
        'url' => $request->url,
        'file' => $image_name,
      ]);

     if ( $status )
     {
       /* == UPDATE SUBJECTS FOR THIS BOOK == */
       $subjects = explode(',', $request->subjects);
       $book->subjects()->sync($subjects);

       return new BookResource($book);
     }
     else return response()->json('Failed to update record', $status);
  }

  /* //====================
    //== DESTROY
   //==================== */
  public function destroy(Book $book)
  {
    /* == PERFORM DELETE == */
    if ( $status = $book->delete() )
    {
      /* == IF BOOK HAS A COVER IMAGE == */
      if ( $book->file )
      {
        /* == DELETE FROM THE LOCAL STORAGE == */
        $this->deleteBookCover($book);
      }
    }

    return response()->json([
        'status' => $status,
        'message' => $status ? 'Book Deleted!' : 'Error Deleting Book'
    ]);
  }

  /* //====================
    //== DOWNLOAD
   //==================== */
  public function download(Book $book)
  {
    // $book = Book::where('uuid', $uuid)->firstOrFail();
    $pathToFile = storage_path('app/public/uploads/' . $book->file);
    return response()->download($pathToFile);
  }

  /* //====================
    //== DELETE BOOK COVER
   //==================== */
  public function deleteBookCover(Book $book)
  {
    /* == REMOVE FROM THE LOCAL FILE STORAGE == */
    if (Storage::disk('books')->exists($book->file)) {
      Storage::disk('books')->delete($book->file);
    }

    $status = $book->removeBookCover();

   return response()->json([
       'status' => $status,
       'message' => $status ? 'Book cover has been removed.' : 'Error deleting book cover'
   ]);
  }

}
