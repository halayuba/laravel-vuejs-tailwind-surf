<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Library\Book;
use App\Http\Resources\{CommentResource, BookResource};

class BookCommentController extends Controller
{
  public function index(Book $book)
  {
    return CommentResource::collection(
      $book->comments()->with(['children', 'user'])->paginate(3)
    );
  }

  public function store(Request $request, Book $book)
  {
    request()->validate([
      'body' => 'required',
    ]);

    $comment = $book->comments()->make([
      'body' => $request->body
    ]);

    request()->user()->comments()->save($comment);

    return new CommentResource($comment);
  }

}
