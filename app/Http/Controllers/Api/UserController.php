<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Http\Resources\{PublicUserResource, UsersResource};

class UserController extends Controller
{
  public function index()
  {
      if(request()->user())
      {
        return new PublicUserResource(request()->user());
      }
      else return null;
  }

  public function allUsers()
  {
    $users = User::all();
    return UsersResource::collection($users);
  }

}
