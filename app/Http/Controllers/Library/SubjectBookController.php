<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Library\Subject;
use App\Http\Resources\Library\BookResource;

class SubjectBookController extends Controller
{
  public function __invoke(Request $request, Subject $subject)
  {
    $books = $subject->books()->ordered()->get();

    return BookResource::collection($books);
  }
}
