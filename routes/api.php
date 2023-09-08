<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\UserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\LikeController;
use App\Http\Controllers\CommentController;

Route::post('v1/user', UserController::class);

Route::apiResource('v1/post', PostController::class)->only([
 'index', 'store', 'show', 'destroy'
]);

Route::post('v1/like', [LikeController::class, 'store']);
Route::delete('v1/like/{like}', [LikeController::class, 'destroy']);

Route::post('v1/comment', [CommentController::class, 'store']);
Route::get('v1/comment', [CommentController::class, 'show']);