<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Learning\ResourceController;


// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth'])->name('dashboard');

Route::redirect('/', '/home');

Route::prefix('home')->group(function(){
  Route::get('/', [HomeController::class, 'index'])->name('home');
});

/*=====================================
  ||||| LEARNING |||||
  =====================================*/
Route::group(['prefix'=>'resources'], function(){
  Route::get('/', [ResourceController::class, 'index'])->name('resources');

});

require __DIR__.'/auth.php';
