<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Resources\Library\SectionResource;
use App\Models\Library\Section;

class SectionController extends Controller
{
  public function update(Request $request, Section $section)
  {
      $body = $request->validate([
        'note' => 'required|string'
      ]);

       //== CONFIRM USER IS ADMIN
      //====================
      if ( auth()->user()->can('perform-admin-actions') )
      {
        $section->update($body);

        return new SectionResource($section);
      }

      return response()->json(['status' => '401']);
  }

  public function destroy(Section $section)
  {
    $status = $section->delete();

    return response()->json([
        'status' => $status,
    ]);
  }
}
