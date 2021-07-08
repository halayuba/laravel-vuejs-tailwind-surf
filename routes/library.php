<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Library\{BookController, BookCommentController, BookSectionController, CommentController, SubjectController, SubjectBookController, SectionController, UploadController};

 //== SUBJECTS
//====================
Route::get('/subjects', SubjectController::class);

 //== BOOKS
//====================
/* == Laravel: Upload File and Hide Real URL for Secure Download under UUID == */
Route::group(['prefix'=>'books'], function(){
  Route::get('/landing', [BookController::class, 'landing'])->name('books');;
  Route::get('/', [BookController::class, 'index']);
  Route::post('/', [BookController::class, 'store'])->middleware('auth:sanctum');
  Route::get('/{book}', [BookController::class, 'show']);
  Route::post('/{book}', [BookController::class, 'update'])->middleware(['auth:sanctum', 'admin']);
  Route::delete('/{book}', [BookController::class, 'destroy'])->middleware(['auth:sanctum', 'admin']);
  // Route::delete('/{book}', 'BookController@destroy')->middleware('auth:sanctum');
  // Route::get('/{book}/download', 'BookController@download');

  /* == BOOK COMMENTS == */
  Route::get('/{book}/comments', [BookCommentController::class, 'index']);
  Route::post('/{book}/comments', [BookCommentController::class, 'store'])->middleware('auth:sanctum');

  /* == BOOK SECTIONS == */
  Route::get('/{book}/sections', [BookSectionController::class, 'index']);
  Route::post('/{book}/sections', [BookSectionController::class, 'store'])->middleware(['auth:sanctum', 'admin']);
});

 //== BOOKS FOR A SPECIFIC SUBJECT
//====================
Route::get('/subject-books/{subject}', SubjectBookController::class);

 //== COMMENTS
//====================
Route::prefix('comments')->middleware('auth:sanctum')->group(function(){
  Route::post('/{comment}', [CommentController::class, 'update']);
  Route::delete('/{comment}', [CommentController::class, 'destory']);
});

 //== SECTIONS
//====================
Route::prefix('sections')->middleware(['auth:sanctum', 'admin'])->group(function(){
  Route::post('/{section}', [SectionController::class, 'update']);
  Route::delete('/{section}', [SectionController::class, 'destroy']);
});

 //== UPLOAD - BOOK COVER
//====================
Route::group(['middleware'=>'auth:sanctum'], function(){
 Route::get('/upload', [UploadController::class, 'index']);
 Route::post('/upload', [UploadController::class, 'store']);
});
