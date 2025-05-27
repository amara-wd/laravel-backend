<?php

use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Models\Tweet;
use App\Http\Controllers\TweetAPIController;

// Route::get('/', function () {
//     return Inertia::render('welcome', ['message' => 'hey there i am amara']);
// })->name('home');
Route::get('/', function () {
    $tweets=Tweet::all();
    return view('welcome', [
    'tweets' => $tweets]);
});

Route::get('/{slug}', function ($slug) {
    $post=\App\Models\Post::whereSlug($slug)->first();
    return view('post', ['post'=> $post]);
    
});

Route::resource('tweets', TweetAPIController::class);
 
// Route::post('/tweets', function ($request) {
//    dd($request->input()->all()) ;
    
// });


// Route::get('/', function () {
//     return view('welcome', ['message' => 'hey i am amara']);
// });

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('dashboard', function () {
        return Inertia::render('dashboard');
    })->name('dashboard');
});





require __DIR__.'/settings.php';
require __DIR__.'/auth.php';
