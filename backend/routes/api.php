<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Models\Comment;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');


Route::get('/testusers', function () {
    return [
        ['id' => 1, 'name' => 'Ali'],
        ['id' => 2, 'name' => 'Tayyab']
    ];
});

Route::middleware(['auth:sanctum'])->group(function () {
    
Route::apiResource('posts', PostController::class);

Route::get('/posts/{post}/comments', [CommentController::class, 'showcomments']);
Route::post('/posts/{post}/comments', [CommentController::class, 'addComment']);

Route::post('/logout', [UserController::class, 'logout']);

Route::middleware(['Admincheck'])->group(function () {
Route::get('/alluser', [UserController::class, 'alluser']);
Route::get('/user/{id}', [UserController::class, 'getUser']);
Route::delete('/user/{id}', [UserController::class, 'deleteUser']);
Route::put('/user/{id}', [UserController::class, 'editUser']);

Route::post('/posts/admin/adduser', [UserController::class, 'adduser']);


});

});



Route::post('/reqister', [UserController::class, 'reqister']);
Route::post('/login', [UserController::class, 'login']);

