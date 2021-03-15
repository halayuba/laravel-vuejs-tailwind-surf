<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\{UserController, ResourceController};

use App\Http\Resources\Learning\{SourceResource, TypeResource, StatusResource, PriorityResource};
use App\Models\Learning\{Source, Type, Status, Priority};

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });


/*=====================================
  ||||| USERS |||||
  =====================================*/
Route::get('/user/auth', [UserController::class, 'index'])->name('user');
Route::get('/users', [UserController::class, 'allUsers'])->name('users');


/*=====================================
  ||||| LEARNING RESOURCES |||||
  =====================================*/
Route::group(['prefix'=>'resources'], function(){
  Route::get('/', [ResourceController::class, 'index']);
  Route::post('/', [ResourceController::class, 'store']);
  Route::put('/{resource}', [ResourceController::class, 'update']);
  Route::delete('/{resource}', [ResourceController::class, 'destroy']);
  Route::put('/{resource}/update-completed', [ResourceController::class, 'updateCompleted']);

  /* == LEARNING SOURCES == */
  Route::get('/sources', function(Request $request){
    return SourceResource::collection(Source::all());
  });

  /* == LEARNING TYPES == */
  Route::get('/types', function(Request $request){
    return TypeResource::collection(Type::all());
  });

  /* == LEARNING SOURCES == */
  Route::get('/statuses', function(Request $request){
    return StatusResource::collection(Status::all());
  });

  /* == LEARNING PRIORITIES == */
  Route::get('/priorities', function(Request $request){
    return PriorityResource::collection(Priority::all());
  });

});
