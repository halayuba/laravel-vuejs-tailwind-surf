<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Library\Book;
use App\Http\Resources\Library\{SectionResource, BookResource};

class BookSectionController extends Controller
{
  public function index(Book $book)
  {
    return SectionResource::collection($book->sections);
  }

  public function store(Request $request, Book $book)
  {
    request()->validate([
      'note' => 'required',
    ]);

    if ( auth()->user()->can('perform-admin-actions') )
    {
      // $section = $book->sections()->make([
      //   'note' => $request->note,
      //   'is_important' => $request->is_important,
      //   'complete_by' => $request->complete_by,
      //   'completed_on' => $request->completed_on
      // ]);
      //
      // request()->user()->sections()->save($section);
      //
      // return new sectionResource($section);
      return "TEST";
    }

    return response()->json(401);
  }

}
