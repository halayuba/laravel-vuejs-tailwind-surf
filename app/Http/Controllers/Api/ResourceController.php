<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Learning\Resource;
use App\Http\Resources\Learning\LearningResource;
use App\Http\Helpers\alerts;
use Illuminate\Validation\Rule;

class ResourceController extends Controller
{
  public function index()
  {
    $resources = Resource::ordered()
                  ->with('source', 'status', 'type', 'priority')
                  ->latest()->get();

    return LearningResource::collection($resources);
  }

  public function store(Request $request)
  {
    request()->validate([
      'title' => 'required|unique:resources,title',
    ], ['name.unique' => 'Duplicate entry.']);

    Resource::create([
      'title' => $request->title,
      'author' => $request->author,
      'url' => $request->url,
      'skills' => $request->skills,
      'published_at' => $request->published_at,
      'duration' => $request->duration,
      'note' => $request->note,
      'priority_id' => $request->priority,
      'source_id' => $request->source,
      'type_id' => $request->type,
    ]);

      /* == RETURN REDIRECT TO JSON == */
      if( request()->wantsJson() )
      {
        return response()->json([
          'status' => 200,
          'message' => "OK",
          'redirect' => '/resources'
        ]);
      }

      return redirect('/resources')->with(alerts::flash_message('/resources', 'success', 'New learning resource(s) has been added successfully.'));
  }

  public function update(Request $request, Resource $resource)
  {
    request()->validate([
      'title' => ['required', Rule::unique('resources')->ignore($resource->id)],
    ], ['title.unique' => 'Your attempt to update this record is rejected as the title already exists in the database!']);

    $resource->update([
      'title' => $request->title,
      'author' => $request->author,
      'url' => $request->url,
      'skills' => $request->skills,
      'published_at' => $request->published_at,
      'duration' => $request->duration,
      'note' => $request->note,
      'priority_id' => $request->priority,
      'source_id' => $request->source,
      'type_id' => $request->type,
    ]);

      /* == RETURN REDIRECT TO JSON == */
      if( request()->wantsJson() )
      {
        return response()->json([
          'status' => 200,
          'message' => "OK",
          'redirect' => '/resources'
        ]);
      }

      return redirect('/resources')->with(alerts::flash_message('/resources', 'success', 'Updated successfully.'));
  }

  public function updateCompleted(Resource $resource)
  {
    $resource->toggleCompleted();
    if( request()->wantsJson() )
    {
      return response()->json([
        'status' => 200,
        'message' => "OK",
        'redirect' => '/resources'
      ]);
    }
  }

  public function destroy(Resource $resource)
  {
    $resource->delete();

    if( request()->wantsJson() ) return [ 'redirect' => '/resources' ];
  }

}
