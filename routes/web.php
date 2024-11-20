<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\LikeController;
use App\Models\Video;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\CategoryVideoController;
use  \App\Models\User;
use Illuminate\Support\Str;
use \App\Http\Controllers\DisLikeController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [IndexController::class, 'index'])
    ->name('index');

Route::get('/videos/create', [VideoController::class, 'create'])
    ->middleware('VerifyEmail')
    ->name('videos.create');

Route::post('/videos', [VideoController::class, 'store'])
    ->name('videos.store');

Route::get('/videos/{video}', [VideoController::class, 'show'])

    ->name('videos.show');

Route::get('/videos/{video}/edit', [VideoController::class, 'edit'])
    ->name('videos.edit');

Route::post('/videos/{video}', [VideoController::class, 'update'])
    ->name('videos.update');

Route::get('/categories/{category:slug}/videos', [CategoryVideoController::class, 'index'])
    ->name('categories.videos.index');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::post('/videos/{video}/comments', [\App\Http\Controllers\CommentController::class, 'store'])
    ->name('comments.store');



Route::get('{likeable_type}/{likeable_id}/like' , [LikeController::class, 'store'])
    ->name('like.store');

Route::get('{likeable_type}/{likeable_id}/dislike' , [DisLikeController::class, 'store'])
    ->name('dislike.store');


require __DIR__ . '/auth.php';





////signed Route

//Route::get('/verify{id}' , function (){
//    dd(request()->hasValidSignature());
//         echo "hello";
//
//})->name('verify');
//Route::get('generate' , function (){
//
//    return URL::temporarySignedRoute('verify', now()->addSecond(10)  , ["id" => 4]);
//});




//
//Route::get('verify  ' , function (){
//    \App\Jobs\Otp::dispatch();
//
//});

//
//Route::get('jops' , function () {
//
//   \App\Jobs\ProcessVideo::dispatch();
//   \App\Jobs\Otp::dispatch();
//});
//
//Route::get('email',function (){
//    \Illuminate\Support\Facades\Mail::to('vpnsra@hi2.in')->send(new \App\Mail\VerifyEmail(User::first()));
//});


/*event*/

//Route::get('event' , function (){
//    $video = Video::first();
//    \App\Events\VideoCreated::dispatch($video);
//});



//Route::get('verify' , function (){
//     $user= User::find(6);
//     $user->notify(new VideoProcessed(Video::first()));
//});


















