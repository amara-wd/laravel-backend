<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\API\CategoryController;



Route::apiResource('categories', CategoryController::class);
Route::prefix('v1')->group(function(){
Route::apiResource('posts', PostController::class);
});

Route::get('comments/{id}');


//http://127.0.0.1:8000/api/testing-the-api  

// Route::get('/testing-the-api',function(){
//  return ['message'=>'hello'];
// });

//posts
//get all(GET) /api/posts
//get a single (GET)  /api/posts/{{ id }}
//create a post(POST) /api/posts
//update a single(PUT/PATCH) /api/posts/{{ id }}
//delete a post (DELETE) /api/posts/{{ id }}



//to create a resource(posts) in laravel
//1)create the database and migrations
//2)create a model
//2.5) create a service (eloquent ORM)
//3)Create a controller to get info from db
//4)return the info

// Route::get('/posts', 'PostController@index');
// Route::post('/posts', 'PostController@store');
// Route::put('/posts', 'PostController@update');
// Route::delete('/posts', 'PostController@destroy');

Route::apiResource('posts', PostController::class);


// Public routes
Route::post('/register', [UserController::class, 'register']);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::middleware(['auth:sanctum'])->group(function(){
    
});

Route::apiResource('/products', ProductController::class);
