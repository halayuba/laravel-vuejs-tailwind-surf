<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Library\Subject;
use App\Http\Resources\Library\SubjectResource;

class SubjectController extends Controller
{

   public function __invoke(Request $request)
   {
     $subjects = Subject::all();

     return SubjectResource::collection($subjects);
   }
}
