<?php

namespace App\Http\Controllers\Library;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Library\Comment;
use App\Http\Resources\Library\CommentResource;

class CommentController extends Controller
{
  public function update(Request $request, Comment $comment)
  {
      $body = $request->validate([
        'body' => 'required|string'
      ]);

       //== CONFIRM USER
      //====================
      if ( request()->user()->id === $comment->user_id )
      {
        $comment->update($body);

        return new CommentResource($comment);
      }

      return response()->json(['status' => '401']);
  }

  public function destroy(Comment $comment)
  {
    /* == CHECK IF THE COMMENT HAS CHILDREN == */
    if ( $comment->children )
    {
      $comment->children->each->delete();
    }

    $status = $comment->delete();

    return response()->json([
        'status' => $status,
    ]);
  }
}
